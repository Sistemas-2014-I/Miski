<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoComprobanteApiTest extends TestCase
{
    use MakeTipoComprobanteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipoComprobante()
    {
        $tipoComprobante = $this->fakeTipoComprobanteData();
        $this->json('POST', '/api/v1/tipoComprobantes', $tipoComprobante);

        $this->assertApiResponse($tipoComprobante);
    }

    /**
     * @test
     */
    public function testReadTipoComprobante()
    {
        $tipoComprobante = $this->makeTipoComprobante();
        $this->json('GET', '/api/v1/tipoComprobantes/'.$tipoComprobante->id);

        $this->assertApiResponse($tipoComprobante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipoComprobante()
    {
        $tipoComprobante = $this->makeTipoComprobante();
        $editedTipoComprobante = $this->fakeTipoComprobanteData();

        $this->json('PUT', '/api/v1/tipoComprobantes/'.$tipoComprobante->id, $editedTipoComprobante);

        $this->assertApiResponse($editedTipoComprobante);
    }

    /**
     * @test
     */
    public function testDeleteTipoComprobante()
    {
        $tipoComprobante = $this->makeTipoComprobante();
        $this->json('DELETE', '/api/v1/tipoComprobantes/'.$tipoComprobante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipoComprobantes/'.$tipoComprobante->id);

        $this->assertResponseStatus(404);
    }
}
