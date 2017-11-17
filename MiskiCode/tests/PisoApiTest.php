<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PisoApiTest extends TestCase
{
    use MakePisoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePiso()
    {
        $piso = $this->fakePisoData();
        $this->json('POST', '/api/v1/pisos', $piso);

        $this->assertApiResponse($piso);
    }

    /**
     * @test
     */
    public function testReadPiso()
    {
        $piso = $this->makePiso();
        $this->json('GET', '/api/v1/pisos/'.$piso->id);

        $this->assertApiResponse($piso->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePiso()
    {
        $piso = $this->makePiso();
        $editedPiso = $this->fakePisoData();

        $this->json('PUT', '/api/v1/pisos/'.$piso->id, $editedPiso);

        $this->assertApiResponse($editedPiso);
    }

    /**
     * @test
     */
    public function testDeletePiso()
    {
        $piso = $this->makePiso();
        $this->json('DELETE', '/api/v1/pisos/'.$piso->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pisos/'.$piso->id);

        $this->assertResponseStatus(404);
    }
}
