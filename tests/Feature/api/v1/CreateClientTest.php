<?php


namespace App\Tests\feature\api\v1;

use App\Tests\Feature\api\ApiTestCase;

class CreateClientTest extends ApiTestCase
{
    /**
     * Тест на успех создания
     */
    public function testSuccessCreate(): void {
        $client = $this->sendPost('api/v1/clients/create', [
            'firstName'   => "jhon",
            'lastName'    => "smith",
            'email'       => 'jhon@smith.com',
            'phoneNumber' => '+72342342342',
        ]);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Тест на не валидынй емайл
     */
    public function testFailEmail(): void {
        $client = $this->sendPost('api/v1/clients/create', [
            'firstName'   => "jhon",
            'lastName'    => "smith",
            'email'       => 'YouSpinMeRound',
            'phoneNumber' => '+72342342342',
        ]);

        $this->assertTrue($client->getResponse()->isForbidden());
    }

    /**
     * Тест на не валидный телефон
     */
    public function testFailPhoneNumber(): void {
        $client = $this->sendPost('api/v1/clients/create', [
            'firstName'   => "jhon",
            'lastName'    => "smith",
            'email'       => 'jhon@smith.com',
            'phoneNumber' => '12312',
        ]);

        $this->assertTrue($client->getResponse()->isForbidden());
    }

    /**
     * Тест на латиницу в имени
     */
    public function testFailFistName(): void {
        $client = $this->sendPost('api/v1/clients/create', [
            'firstName'   => "кириллица",
            'lastName'    => "smith",
            'email'       => 'jhon@smith.com',
            'phoneNumber' => '12312',
        ]);

        $this->assertTrue($client->getResponse()->isForbidden());
    }

}