<?php

declare(strict_types=1);

namespace App\services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

readonly class EmailValidatorService
{
    public function __construct(private string $baseUrl = 'https://jsonplaceholder.typicode.com/')
    {
    }

    /**
     * @throws GuzzleException
     */
    public function verify(int $id): array
    {
        $comments = array();

        $client = new Client(
            [
                'base_uri' => $this->baseUrl,
                'timeout' => 5
            ]
        );

        $params = [
            'postId' => $id,
        ];

        $response = $client->get('comments', ['query' => $params]);

        if ($response->getStatusCode() === 200) {
            $comments = json_decode($response->getBody()->getContents(), true);
        }

        return $comments;
    }

}