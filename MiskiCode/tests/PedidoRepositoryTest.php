<?php

use App\Models\Pedido;
use App\Repositories\PedidoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PedidoRepositoryTest extends TestCase
{
    use MakePedidoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PedidoRepository
     */
    protected $pedidoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pedidoRepo = App::make(PedidoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePedido()
    {
        $pedido = $this->fakePedidoData();
        $createdPedido = $this->pedidoRepo->create($pedido);
        $createdPedido = $createdPedido->toArray();
        $this->assertArrayHasKey('id', $createdPedido);
        $this->assertNotNull($createdPedido['id'], 'Created Pedido must have id specified');
        $this->assertNotNull(Pedido::find($createdPedido['id']), 'Pedido with given id must be in DB');
        $this->assertModelData($pedido, $createdPedido);
    }

    /**
     * @test read
     */
    public function testReadPedido()
    {
        $pedido = $this->makePedido();
        $dbPedido = $this->pedidoRepo->find($pedido->id);
        $dbPedido = $dbPedido->toArray();
        $this->assertModelData($pedido->toArray(), $dbPedido);
    }

    /**
     * @test update
     */
    public function testUpdatePedido()
    {
        $pedido = $this->makePedido();
        $fakePedido = $this->fakePedidoData();
        $updatedPedido = $this->pedidoRepo->update($fakePedido, $pedido->id);
        $this->assertModelData($fakePedido, $updatedPedido->toArray());
        $dbPedido = $this->pedidoRepo->find($pedido->id);
        $this->assertModelData($fakePedido, $dbPedido->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePedido()
    {
        $pedido = $this->makePedido();
        $resp = $this->pedidoRepo->delete($pedido->id);
        $this->assertTrue($resp);
        $this->assertNull(Pedido::find($pedido->id), 'Pedido should not exist in DB');
    }
}
