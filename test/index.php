<?php
require '../lib/transfiguration.php';
#creating transfiguration object
$transfiguration = new transfiguration();

#load html
$transfiguration->loadHtml(file_get_contents("template.html"));

#replacing values with data
$values = array(
  "name" => "steve",
  "old" => "19 years old"
);
$transfiguration->replaceValues($values);

#adding html elements
$elements = array(
  "head" => [
    "tagname" => "link",
    "rel" => "stylesheet",
    "href" => "link/to/css"
  ],
  "body" => [
    "tagname" => "p",
    "style" => "font-weight:bold;",
    "html" => "<i>This was added Later</i>",
  ]
);
$transfiguration->addDom($elements);

$values = array(
  [
    "link" => "https://github.com/svichas/transfiguration",
    "text" => "GitHub"
  ],
  [
    "link" => "http://facebook.com/",
    "text" => "Facebook"
  ],
  [
    "link" => "http://youtube.com/",
    "text" => "Youtube"
  ]
);
#creating code blocks
$transfiguration->block("links",$values);

#print transfigured html
print $transfiguration->exportHtml();
