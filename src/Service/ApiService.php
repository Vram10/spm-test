<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    public function __construct(
        private HttpClientInterface $httpClient
    ) {}

    public function getHello(): string
    {
        $response = $this->httpClient->request(
            'GET',
            'http://hello-api:8080/api/hello'
        );

        $data = $response->toArray();

        return $data['text'];
    }
}
