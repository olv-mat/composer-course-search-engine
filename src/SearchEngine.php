<?php

namespace Project\SearchEngine;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class SearchEngine
{
    public function __construct(
        private ClientInterface $httpClient,
        private Crawler $crawler
    ) {
    }
    public function search(string $url): array
    {
        $response = $this->httpClient->request("GET", $url, ["verify" => false]);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);
        $coursesElements = $this->crawler->filter("span.card-curso__nome");
        $courses = [];
        foreach ($coursesElements as $element) {
            $courses[] = $element->textContent;
        }
        return $courses;
    }
}
