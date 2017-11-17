<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComprobanteDetalleApiTest extends TestCase
{
    use MakeComprobanteDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateComprobanteDetalle()
    {
        $comprobanteDetalle = $this->fakeComprobanteDetalleData();
        $this->json('POST', '/api/v1/comprobanteDetalles', $comprobanteDetalle);

        $this->assertApiResponse($comprobanteDetalle);
    }

    /**
     * @test
     */
    public function testReadComprobanteDetalle()
    {
        $comprobanteDetalle = $this->makeComprobanteDetalle();
        $this->json('GET', '/api/v1/comprobanteDetalles/'.$comprobanteDetalle->id);

        $this->assertApiResponse($comprobanteDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateComprobanteDetalle()
    {
        $comprobanteDetalle = $this->makeComprobanteDetalle();
        $editedComprobanteDetalle = $this->fakeComprobanteDetalleData();

        $this->json('PUT', '/api/v1/comprobanteDetalles/'.$comprobanteDetalle->id, $editedComprobanteDetalle);

        $this->assertApiResponse($editedComprobanteDetalle);
    }

    /**
     * @test
     */
    public function testDeleteComprobanteDetalle()
    {
        $comprobanteDetalle = $this->makeComprobanteDetalle();
        $this->json('DELETE', '/api/v1/comprobanteDetalles/'.$comprobanteDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comprobanteDetalles/'.$comprobanteDetalle->id);

        $this->assertResponseStatus(404);
    }
}
