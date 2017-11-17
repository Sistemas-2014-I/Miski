<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MonedaApiTest extends TestCase
{
    use MakeMonedaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMoneda()
    {
        $moneda = $this->fakeMonedaData();
        $this->json('POST', '/api/v1/monedas', $moneda);

        $this->assertApiResponse($moneda);
    }

    /**
     * @test
     */
    public function testReadMoneda()
    {
        $moneda = $this->makeMoneda();
        $this->json('GET', '/api/v1/monedas/'.$moneda->id);

        $this->assertApiResponse($moneda->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMoneda()
    {
        $moneda = $this->makeMoneda();
        $editedMoneda = $this->fakeMonedaData();

        $this->json('PUT', '/api/v1/monedas/'.$moneda->id, $editedMoneda);

        $this->assertApiResponse($editedMoneda);
    }

    /**
     * @test
     */
    public function testDeleteMoneda()
    {
        $moneda = $this->makeMoneda();
        $this->json('DELETE', '/api/v1/monedas/'.$moneda->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/monedas/'.$moneda->id);

        $this->assertResponseStatus(404);
    }
}
