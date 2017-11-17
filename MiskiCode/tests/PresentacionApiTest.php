<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresentacionApiTest extends TestCase
{
    use MakePresentacionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePresentacion()
    {
        $presentacion = $this->fakePresentacionData();
        $this->json('POST', '/api/v1/presentacions', $presentacion);

        $this->assertApiResponse($presentacion);
    }

    /**
     * @test
     */
    public function testReadPresentacion()
    {
        $presentacion = $this->makePresentacion();
        $this->json('GET', '/api/v1/presentacions/'.$presentacion->id);

        $this->assertApiResponse($presentacion->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePresentacion()
    {
        $presentacion = $this->makePresentacion();
        $editedPresentacion = $this->fakePresentacionData();

        $this->json('PUT', '/api/v1/presentacions/'.$presentacion->id, $editedPresentacion);

        $this->assertApiResponse($editedPresentacion);
    }

    /**
     * @test
     */
    public function testDeletePresentacion()
    {
        $presentacion = $this->makePresentacion();
        $this->json('DELETE', '/api/v1/presentacions/'.$presentacion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/presentacions/'.$presentacion->id);

        $this->assertResponseStatus(404);
    }
}
