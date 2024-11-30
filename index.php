<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Project\SearchEngine\SearchEngine;

$client = new Client();
$crawler = new Crawler();

$searchEngine = new SearchEngine($client, $crawler);
$courses = $searchEngine->search('https://www.alura.com.br/cursos-online-programacao/php');
foreach ($courses as $course) {
    showMessage($course);
}
