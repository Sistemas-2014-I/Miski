<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParametroApiTest extends TestCase
{
    use MakeParametroTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateParametro()
    {
        $parametro = $this->fakeParametroData();
        $this->json('POST', '/api/v1/parametros', $parametro);

        $this->assertApiResponse($parametro);
    }

    /**
     * @test
     */
    public function testReadParametro()
    {
        $parametro = $this->makeParametro();
        $this->json('GET', '/api/v1/parametros/'.$parametro->id);

        $this->assertApiResponse($parametro->toArray());
    }

    /**
     * @test
     */
    public function testUpdateParametro()
    {
        $parametro = $this->makeParametro();
        $editedParametro = $this->fakeParametroData();

        $this->json('PUT', '/api/v1/parametros/'.$parametro->id, $editedParametro);

        $this->assertApiResponse($editedParametro);
    }

    /**
     * @test
     */
    public function testDeleteParametro()
    {
        $parametro = $this->makeParametro();
        $this->json('DELETE', '/api/v1/parametros/'.$parametro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/parametros/'.$parametro->id);

        $this->assertResponseStatus(404);
    }
}
