#
# Runs a scrapper on the old version of the wild project
#
# import libraries
import urllib2
import html2text
import datetime
from bs4 import BeautifulSoup
import sys
import os
reload(sys)
sys.setdefaultencoding("utf-8")

home_page = 'http://thewildproject.com/performances/index.shtml'
#years = [2018, 2017, 2016, 2015, 2014, 2013, 2012, 2011,2010, 2009, 2008, 2007]
#years = [2007]
gallery_years = [2016, 2015, 2014, 2013, 2011,2010, 2009, 2008]
type = "gallery"


#
# Parse a given Performance page to get the title
#
def parse_performance_page(url):
  postInfo = {}
  print url
  # query the website and return the html to the variable
  try:
    page = urllib2.urlopen(url)
    # parse the html using beautiful soup and store in variable
    soup = BeautifulSoup(page, 'html.parser')
    # Take out the <div> of name and get its value
    title_box = soup.find('p', attrs={'class': 'showTitle'})

    if (title_box is None):
      title_box = soup.find('span', attrs={'class': 'showTitle'})

      if (title_box is None):
        title_box = soup.find('h2', attrs={'class': 'showTitle'})
        postInfo['title'] = title_box.text.strip()
      else:
        postInfo['title'] = title_box.text.strip()
      if (title_box is None):
        postInfo['title'] = 'Past Performance'
    else:
      postInfo['title'] = title_box.text.strip()

    # get the index price
    imgs = soup.find_all('img')
    for img in imgs:
      img_src = unicode(img).replace('img/', 'http://localhost:3000/wp-content/themes/wildproject/images/gallery/' )
      img.replace_with(img_src)

    rows = soup.find_all('tr')
    # get the performance content
    for row in rows:
      row_title = row.find('p', attrs={'class': 'showTitle'})
      row_title_alt_2 = row.find('span', attrs={'class': 'showTitle'})
      row_title_alt = row.find('h2', attrs={'class': 'firstheader'})
      row_title_alt_3 = row.find('h2', attrs={'class': 'showTitle'})
      main_row = ''

      if (row_title or row_title_alt or row_title_alt_2 or row_title_alt_3):
        columns = row.find_all('td')
        for column in columns:
          main_row += ''.join(map(str, column.contents))
        postInfo['content'] = main_row
    return postInfo
  except IOError, e:
    print 'Failed to open "%s".' % url
    if hasattr(e, 'code'):
      print 'We failed with error code - %s.' % e.code
    elif hasattr(e, 'reason'):
      print "The error object has the following 'reason' attribute :"
      print e.reason
    return postInfo;

#
# Go to this Archive URL
#
def go_to_archive(year):
  archive_url = "http://thewildproject.com/" + type +  "/archive-YEAR.shtml"

  print

  url = archive_url.replace("YEAR", str(year))
  print "archive: " + url
  page = urllib2.urlopen(url)
  soup = BeautifulSoup(page, 'html.parser')

  links = {}
  if (year > 2013):
    links = soup.find_all('div', attrs={'class': 'pastTitle'})
  else:
    links = soup.find_all('a', attrs={'class': 'pastList'})


  for link in links:
    urlContainer = link.find('a', attrs={'class', 'pastList'})
    url = ''
    if (urlContainer):
      url = urlContainer.get('href')
    else:
      url = link.get('href')


    url = url.replace('../../../', '')
    url = "http://thewildproject.com/" + url;
    if (url != 'http://thewildproject.com/performances/2011-Rampart.shtml' and url != 'http://thewildproject.com/performances/2018-Spaceman.shtml'
):
      performance = parse_performance_page(url)

    if (len(performance) > 0):
      push_to_wordpress(year, performance)
    else:
      print 'No Performance Info'



def write_to_file(string, year):
  file_name = str(year) + ".sql"
  file = ''
  if os.path.exists(file_name):
    file  = open(file_name, "a")
  else:
    file  = open(file_name, "w+")

  file.write(string)

  file.close()

#
# connect to the Wordpress Rest api and upload it to the server
#
def push_to_wordpress(year, postInfo):
  f = '%Y-%m-%d %H:%M:%S'
  if (type == "performances"):
    post_type = "performancearchive"
  else:
    post_type = "galleryarchive"

  time_now = datetime.datetime.now().strftime(f)
  post_title = postInfo['title'].replace('"', '\\"').replace("'", "\\'")
  post_name = postInfo['title']
  post_content = postInfo['content'].replace('"', '\\"').replace("'", "\\'").replace('&gt;', '>').replace('&lt;', '<')

  post_name =''.join(e for e in post_name if (e.isalnum() or e == ' '))
  post_name = post_name.replace(' ', '_')

  insert = "INSERT INTO wp_posts (post_title, post_content, post_name, post_date, post_date_gmt, post_modified, post_modified_gmt, post_author, post_status, post_type) VALUES ('TITLE', 'CONTENT', 'POST_NAME', 'POST_DATE', 'POST_DATE', 'POST_DATE', 'POST_DATE', 1, 'publish','POST_TYPE'); \n";

  #print post_name
  insert_query = insert.replace("TITLE", post_title).replace('CONTENT',  post_content).replace('POST_DATE', time_now).replace('POST_NAME', post_name).replace('POST_TYPE', post_type)
  write_to_file(insert_query, year)


#
# Run scrapper
#
def run():
  #test_url = 'http://thewildproject.com/performances/2017-SUMMERWORKS.shtml'
  #performance = parse_performance_page(test_url)
  #push_to_wordpress(2016, performance)
  # iterate through the archive years
  #go_to_archive(2016)
  #for year in years:
  #  go_to_archive(year)

  for year in gallery_years:
    type = "gallery"
    go_to_archive(year)

run()