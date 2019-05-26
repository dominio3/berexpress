<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsignementApiTest extends TestCase
{
    use MakeConsignementTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConsignement()
    {
        $consignement = $this->fakeConsignementData();
        $this->json('POST', '/api/v1/consignements', $consignement);

        $this->assertApiResponse($consignement);
    }

    /**
     * @test
     */
    public function testReadConsignement()
    {
        $consignement = $this->makeConsignement();
        $this->json('GET', '/api/v1/consignements/'.$consignement->id);

        $this->assertApiResponse($consignement->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConsignement()
    {
        $consignement = $this->makeConsignement();
        $editedConsignement = $this->fakeConsignementData();

        $this->json('PUT', '/api/v1/consignements/'.$consignement->id, $editedConsignement);

        $this->assertApiResponse($editedConsignement);
    }

    /**
     * @test
     */
    public function testDeleteConsignement()
    {
        $consignement = $this->makeConsignement();
        $this->json('DELETE', '/api/v1/consignements/'.$consignement->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/consignements/'.$consignement->id);

        $this->assertResponseStatus(404);
    }
}
