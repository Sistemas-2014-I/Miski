<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComprobanteApiTest extends TestCase
{
    use MakeComprobanteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateComprobante()
    {
        $comprobante = $this->fakeComprobanteData();
        $this->json('POST', '/api/v1/comprobantes', $comprobante);

        $this->assertApiResponse($comprobante);
    }

    /**
     * @test
     */
    public function testReadComprobante()
    {
        $comprobante = $this->makeComprobante();
        $this->json('GET', '/api/v1/comprobantes/'.$comprobante->id);

        $this->assertApiResponse($comprobante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateComprobante()
    {
        $comprobante = $this->makeComprobante();
        $editedComprobante = $this->fakeComprobanteData();

        $this->json('PUT', '/api/v1/comprobantes/'.$comprobante->id, $editedComprobante);

        $this->assertApiResponse($editedComprobante);
    }

    /**
     * @test
     */
    public function testDeleteComprobante()
    {
        $comprobante = $this->makeComprobante();
        $this->json('DELETE', '/api/v1/comprobantes/'.$comprobante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comprobantes/'.$comprobante->id);

        $this->assertResponseStatus(404);
    }
}
