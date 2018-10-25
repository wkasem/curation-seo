<?php 
header('Content-Type: application/json');

$url = "http://www.slideshare.net/search/slideshow.json?type=presentations&sort=relevance&q=" . $_GET['word'] . "&items_per_page=10&page=" . $_GET['page'];


echo file_get_contents($url);