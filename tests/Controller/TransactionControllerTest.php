<?php

namespace App\Tests\Controller;

use App\Dictionary\TransactionStatusDictionary;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TransactionControllerTest extends WebTestCase
{
    const ENDPOINT = '/api/transactions';

    public function testListActionReturnsJSON()
    {
        $client = static::createClient();

        $client->request('GET', self::ENDPOINT);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testListActionReturnsPaginationData()
    {
        $client = static::createClient();

        $client->request('GET', self::ENDPOINT);

        $res = json_decode($client->getResponse()->getContent());

        $this->assertObjectHasAttribute('pagination', $res);
        $this->assertObjectHasAttribute('limit', $res->pagination);
        $this->assertObjectHasAttribute('page', $res->pagination);
        $this->assertObjectHasAttribute('order', $res->pagination);
    }

    public function testListActionReturnsAnArrayOfTransactions()
    {
        $client = static::createClient();

        $client->request('GET', self::ENDPOINT);

        $res = json_decode($client->getResponse()->getContent());

        $this->assertObjectHasAttribute('data', $res);
        $this->assertTrue(is_array($res->data), "Failed asserting that data is an array.\nActual type: " . gettype($res->data));
        $this->assertTrue(count($res->data) > 0, 'Failed asserting that data has count greater than 0.');
        $this->assertObjectHasAttribute('id', $res->data[0]);
        $this->assertObjectHasAttribute('provider', $res->data[0]);
        $this->assertObjectHasAttribute('amount', $res->data[0]);
        $this->assertObjectHasAttribute('type', $res->data[0]);
        $this->assertObjectHasAttribute('currency', $res->data[0]);
    }

    public function testListActionResultsCanBeLimited()
    {
        $client = static::createClient();

        $client->request('GET', self::ENDPOINT . '?limit=1');

        $res = json_decode($client->getResponse()->getContent());

        $this->assertObjectHasAttribute('pagination', $res);
        $this->assertAttributeEquals('1', 'limit', $res->pagination);
        $this->assertObjectHasAttribute('data', $res);
        $this->assertCount(1, $res->data);
    }

    public function testListActionResultsCanBeFiltered()
    {
        $client = static::createClient();

        $client->request('GET', self::ENDPOINT . '?filter=' . TransactionStatusDictionary::SUCCESS);

        $res = json_decode($client->getResponse()->getContent());

        $this->assertObjectHasAttribute('data', $res);

        foreach ($res->data as $item) {
            $this->assertAttributeEquals(TransactionStatusDictionary::SUCCESS, 'status', $item);
        }
    }

    public function testCreateActionReturnsValidationErrorOnEmptyPOST()
    {
        $client = static::createClient();

        $client->request('POST', self::ENDPOINT);

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());

        $res = json_decode($client->getResponse()->getContent());

        $this->assertObjectHasAttribute('validation_messages', $res);
    }
}
