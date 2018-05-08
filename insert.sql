INSERT INTO wp_posts
  (post_title,
    post_content,
    post_name,
    post_date,
    post_date_gmt,
    post_modified,
    post_modified_gmt,
    post_author,
    post_status,
    post_type)
  VALUES (
    'title',
    'text',
    'post_name',
    now(),
    now(),
    now(),
    now(),
    1,
    'publish',
    'performancearchive')
