<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoPedidoApiTest extends TestCase
{
    use MakeEstadoPedidoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEstadoPedido()
    {
        $estadoPedido = $this->fakeEstadoPedidoData();
        $this->json('POST', '/api/v1/estadoPedidos', $estadoPedido);

        $this->assertApiResponse($estadoPedido);
    }

    /**
     * @test
     */
    public function testReadEstadoPedido()
    {
        $estadoPedido = $this->makeEstadoPedido();
        $this->json('GET', '/api/v1/estadoPedidos/'.$estadoPedido->id);

        $this->assertApiResponse($estadoPedido->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEstadoPedido()
    {
        $estadoPedido = $this->makeEstadoPedido();
        $editedEstadoPedido = $this->fakeEstadoPedidoData();

        $this->json('PUT', '/api/v1/estadoPedidos/'.$estadoPedido->id, $editedEstadoPedido);

        $this->assertApiResponse($editedEstadoPedido);
    }

    /**
     * @test
     */
    public function testDeleteEstadoPedido()
    {
        $estadoPedido = $this->makeEstadoPedido();
        $this->json('DELETE', '/api/v1/estadoPedidos/'.$estadoPedido->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estadoPedidos/'.$estadoPedido->id);

        $this->assertResponseStatus(404);
    }
}
