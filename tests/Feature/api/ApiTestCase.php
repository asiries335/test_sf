<?php


namespace App\Tests\Feature\api;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTestCase extends WebTestCase
{
    /**
     * @param string $url
     * @param array $bodyRequest
     * @return KernelBrowser
     */
    public function sendPost(string $url, array $bodyRequest = []): KernelBrowser {
        $client = static::createClient([], [
            'CONTENT_TYPE' => 'application/json',
        ]);

        $client->request(
            'POST',
            $url,
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode($bodyRequest)
        );

        return $client;
    }
}