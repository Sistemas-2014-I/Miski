<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CajaDetalleApiTest extends TestCase
{
    use MakeCajaDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCajaDetalle()
    {
        $cajaDetalle = $this->fakeCajaDetalleData();
        $this->json('POST', '/api/v1/cajaDetalles', $cajaDetalle);

        $this->assertApiResponse($cajaDetalle);
    }

    /**
     * @test
     */
    public function testReadCajaDetalle()
    {
        $cajaDetalle = $this->makeCajaDetalle();
        $this->json('GET', '/api/v1/cajaDetalles/'.$cajaDetalle->id);

        $this->assertApiResponse($cajaDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCajaDetalle()
    {
        $cajaDetalle = $this->makeCajaDetalle();
        $editedCajaDetalle = $this->fakeCajaDetalleData();

        $this->json('PUT', '/api/v1/cajaDetalles/'.$cajaDetalle->id, $editedCajaDetalle);

        $this->assertApiResponse($editedCajaDetalle);
    }

    /**
     * @test
     */
    public function testDeleteCajaDetalle()
    {
        $cajaDetalle = $this->makeCajaDetalle();
        $this->json('DELETE', '/api/v1/cajaDetalles/'.$cajaDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cajaDetalles/'.$cajaDetalle->id);

        $this->assertResponseStatus(404);
    }
}
