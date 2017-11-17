<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormaPagoDetalleApiTest extends TestCase
{
    use MakeFormaPagoDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->fakeFormaPagoDetalleData();
        $this->json('POST', '/api/v1/formaPagoDetalles', $formaPagoDetalle);

        $this->assertApiResponse($formaPagoDetalle);
    }

    /**
     * @test
     */
    public function testReadFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->makeFormaPagoDetalle();
        $this->json('GET', '/api/v1/formaPagoDetalles/'.$formaPagoDetalle->id);

        $this->assertApiResponse($formaPagoDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->makeFormaPagoDetalle();
        $editedFormaPagoDetalle = $this->fakeFormaPagoDetalleData();

        $this->json('PUT', '/api/v1/formaPagoDetalles/'.$formaPagoDetalle->id, $editedFormaPagoDetalle);

        $this->assertApiResponse($editedFormaPagoDetalle);
    }

    /**
     * @test
     */
    public function testDeleteFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->makeFormaPagoDetalle();
        $this->json('DELETE', '/api/v1/formaPagoDetalles/'.$formaPagoDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/formaPagoDetalles/'.$formaPagoDetalle->id);

        $this->assertResponseStatus(404);
    }
}
