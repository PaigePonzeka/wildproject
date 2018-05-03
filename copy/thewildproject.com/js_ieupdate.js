// to get rid off the border around swf in IE

theObjects = document.getElementsByTagName("object"); 
for (var i = 0; i < theObjects.length; i++) { 
theObjects[i].outerHTML = theObjects[i].outerHTML; 
}