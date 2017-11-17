<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormaPagoApiTest extends TestCase
{
    use MakeFormaPagoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFormaPago()
    {
        $formaPago = $this->fakeFormaPagoData();
        $this->json('POST', '/api/v1/formaPagos', $formaPago);

        $this->assertApiResponse($formaPago);
    }

    /**
     * @test
     */
    public function testReadFormaPago()
    {
        $formaPago = $this->makeFormaPago();
        $this->json('GET', '/api/v1/formaPagos/'.$formaPago->id);

        $this->assertApiResponse($formaPago->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFormaPago()
    {
        $formaPago = $this->makeFormaPago();
        $editedFormaPago = $this->fakeFormaPagoData();

        $this->json('PUT', '/api/v1/formaPagos/'.$formaPago->id, $editedFormaPago);

        $this->assertApiResponse($editedFormaPago);
    }

    /**
     * @test
     */
    public function testDeleteFormaPago()
    {
        $formaPago = $this->makeFormaPago();
        $this->json('DELETE', '/api/v1/formaPagos/'.$formaPago->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/formaPagos/'.$formaPago->id);

        $this->assertResponseStatus(404);
    }
}
