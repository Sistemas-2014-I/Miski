<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresentacionProductoApiTest extends TestCase
{
    use MakePresentacionProductoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePresentacionProducto()
    {
        $presentacionProducto = $this->fakePresentacionProductoData();
        $this->json('POST', '/api/v1/presentacionProductos', $presentacionProducto);

        $this->assertApiResponse($presentacionProducto);
    }

    /**
     * @test
     */
    public function testReadPresentacionProducto()
    {
        $presentacionProducto = $this->makePresentacionProducto();
        $this->json('GET', '/api/v1/presentacionProductos/'.$presentacionProducto->id);

        $this->assertApiResponse($presentacionProducto->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePresentacionProducto()
    {
        $presentacionProducto = $this->makePresentacionProducto();
        $editedPresentacionProducto = $this->fakePresentacionProductoData();

        $this->json('PUT', '/api/v1/presentacionProductos/'.$presentacionProducto->id, $editedPresentacionProducto);

        $this->assertApiResponse($editedPresentacionProducto);
    }

    /**
     * @test
     */
    public function testDeletePresentacionProducto()
    {
        $presentacionProducto = $this->makePresentacionProducto();
        $this->json('DELETE', '/api/v1/presentacionProductos/'.$presentacionProducto->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/presentacionProductos/'.$presentacionProducto->id);

        $this->assertResponseStatus(404);
    }
}
