<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoEmpleadoApiTest extends TestCase
{
    use MakeTipoEmpleadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipoEmpleado()
    {
        $tipoEmpleado = $this->fakeTipoEmpleadoData();
        $this->json('POST', '/api/v1/tipoEmpleados', $tipoEmpleado);

        $this->assertApiResponse($tipoEmpleado);
    }

    /**
     * @test
     */
    public function testReadTipoEmpleado()
    {
        $tipoEmpleado = $this->makeTipoEmpleado();
        $this->json('GET', '/api/v1/tipoEmpleados/'.$tipoEmpleado->id);

        $this->assertApiResponse($tipoEmpleado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipoEmpleado()
    {
        $tipoEmpleado = $this->makeTipoEmpleado();
        $editedTipoEmpleado = $this->fakeTipoEmpleadoData();

        $this->json('PUT', '/api/v1/tipoEmpleados/'.$tipoEmpleado->id, $editedTipoEmpleado);

        $this->assertApiResponse($editedTipoEmpleado);
    }

    /**
     * @test
     */
    public function testDeleteTipoEmpleado()
    {
        $tipoEmpleado = $this->makeTipoEmpleado();
        $this->json('DELETE', '/api/v1/tipoEmpleados/'.$tipoEmpleado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipoEmpleados/'.$tipoEmpleado->id);

        $this->assertResponseStatus(404);
    }
}
