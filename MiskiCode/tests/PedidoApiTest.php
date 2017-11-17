<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PedidoApiTest extends TestCase
{
    use MakePedidoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePedido()
    {
        $pedido = $this->fakePedidoData();
        $this->json('POST', '/api/v1/pedidos', $pedido);

        $this->assertApiResponse($pedido);
    }

    /**
     * @test
     */
    public function testReadPedido()
    {
        $pedido = $this->makePedido();
        $this->json('GET', '/api/v1/pedidos/'.$pedido->id);

        $this->assertApiResponse($pedido->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePedido()
    {
        $pedido = $this->makePedido();
        $editedPedido = $this->fakePedidoData();

        $this->json('PUT', '/api/v1/pedidos/'.$pedido->id, $editedPedido);

        $this->assertApiResponse($editedPedido);
    }

    /**
     * @test
     */
    public function testDeletePedido()
    {
        $pedido = $this->makePedido();
        $this->json('DELETE', '/api/v1/pedidos/'.$pedido->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pedidos/'.$pedido->id);

        $this->assertResponseStatus(404);
    }
}
