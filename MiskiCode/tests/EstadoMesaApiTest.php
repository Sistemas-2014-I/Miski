<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoMesaApiTest extends TestCase
{
    use MakeEstadoMesaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEstadoMesa()
    {
        $estadoMesa = $this->fakeEstadoMesaData();
        $this->json('POST', '/api/v1/estadoMesas', $estadoMesa);

        $this->assertApiResponse($estadoMesa);
    }

    /**
     * @test
     */
    public function testReadEstadoMesa()
    {
        $estadoMesa = $this->makeEstadoMesa();
        $this->json('GET', '/api/v1/estadoMesas/'.$estadoMesa->id);

        $this->assertApiResponse($estadoMesa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEstadoMesa()
    {
        $estadoMesa = $this->makeEstadoMesa();
        $editedEstadoMesa = $this->fakeEstadoMesaData();

        $this->json('PUT', '/api/v1/estadoMesas/'.$estadoMesa->id, $editedEstadoMesa);

        $this->assertApiResponse($editedEstadoMesa);
    }

    /**
     * @test
     */
    public function testDeleteEstadoMesa()
    {
        $estadoMesa = $this->makeEstadoMesa();
        $this->json('DELETE', '/api/v1/estadoMesas/'.$estadoMesa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estadoMesas/'.$estadoMesa->id);

        $this->assertResponseStatus(404);
    }
}
