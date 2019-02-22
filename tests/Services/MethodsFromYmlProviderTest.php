<?php

namespace App\Tests\Services;

use App\DTO\AdditionalDataFieldDTO;
use App\DTO\MethodDTO;
use App\Services\MethodsFromYmlProvider;
use PHPUnit\Framework\TestCase;

class MethodsFromYmlProviderTest extends TestCase
{
    public function testGetMethods()
    {
        $methodInput = [
            [
                'name' => 'paypal',
                'label' => 'PayPal',
                'types' => ['deposit', 'withdraw'],
                'additionalData' => [
                    [
                        'name' => 'username',
                        'label' => 'User name',
                        'type' => 'text',
                        'required' => true,
                    ],
                ],
            ],
        ];
        $additionalField = $methodInput[0]['additionalData'][0];

        $methodOutput = [new MethodDTO(
            $methodInput[0]['name'],
            $methodInput[0]['label'],
            $methodInput[0]['types'],
            [
                new AdditionalDataFieldDTO(
                    $additionalField['name'],
                    $additionalField['label'],
                    $additionalField['type'],
                    $additionalField['required']
                )
            ]
        )];

        $methodsProvider = new MethodsFromYmlProvider($methodInput);

        $this->assertEquals($methodOutput, $methodsProvider->getMethods());
    }
}