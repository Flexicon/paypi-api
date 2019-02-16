<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PingControllerTest extends WebTestCase
{
    public function testPingAction()
    {
        $client = static::createClient();

        $client->request('GET', '/api/ping');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $res = json_decode($client->getResponse()->getContent());

        $this->assertTrue(is_numeric($res->ack));
    }
}