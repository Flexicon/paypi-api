<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MethodsControllerTest extends WebTestCase
{
    public function testIndexActionReturnsAnArrayOfMethods()
    {
        $client = static::createClient();

        $client->request('GET', '/api/methods');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());

        $res = json_decode($client->getResponse()->getContent());

        $this->assertTrue(is_array($res));
        $this->assertObjectHasAttribute('name', $res[0]);
        $this->assertObjectHasAttribute('label', $res[0]);
        $this->assertObjectHasAttribute('types', $res[0]);
        $this->assertObjectHasAttribute('additional_data', $res[0]);
    }
}