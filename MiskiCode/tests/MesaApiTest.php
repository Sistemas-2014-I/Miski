<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MesaApiTest extends TestCase
{
    use MakeMesaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMesa()
    {
        $mesa = $this->fakeMesaData();
        $this->json('POST', '/api/v1/mesas', $mesa);

        $this->assertApiResponse($mesa);
    }

    /**
     * @test
     */
    public function testReadMesa()
    {
        $mesa = $this->makeMesa();
        $this->json('GET', '/api/v1/mesas/'.$mesa->id);

        $this->assertApiResponse($mesa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMesa()
    {
        $mesa = $this->makeMesa();
        $editedMesa = $this->fakeMesaData();

        $this->json('PUT', '/api/v1/mesas/'.$mesa->id, $editedMesa);

        $this->assertApiResponse($editedMesa);
    }

    /**
     * @test
     */
    public function testDeleteMesa()
    {
        $mesa = $this->makeMesa();
        $this->json('DELETE', '/api/v1/mesas/'.$mesa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mesas/'.$mesa->id);

        $this->assertResponseStatus(404);
    }
}
