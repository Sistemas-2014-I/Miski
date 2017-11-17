<?php

use App\Models\EstadoPedido;
use App\Repositories\EstadoPedidoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoPedidoRepositoryTest extends TestCase
{
    use MakeEstadoPedidoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstadoPedidoRepository
     */
    protected $estadoPedidoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->estadoPedidoRepo = App::make(EstadoPedidoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEstadoPedido()
    {
        $estadoPedido = $this->fakeEstadoPedidoData();
        $createdEstadoPedido = $this->estadoPedidoRepo->create($estadoPedido);
        $createdEstadoPedido = $createdEstadoPedido->toArray();
        $this->assertArrayHasKey('id', $createdEstadoPedido);
        $this->assertNotNull($createdEstadoPedido['id'], 'Created EstadoPedido must have id specified');
        $this->assertNotNull(EstadoPedido::find($createdEstadoPedido['id']), 'EstadoPedido with given id must be in DB');
        $this->assertModelData($estadoPedido, $createdEstadoPedido);
    }

    /**
     * @test read
     */
    public function testReadEstadoPedido()
    {
        $estadoPedido = $this->makeEstadoPedido();
        $dbEstadoPedido = $this->estadoPedidoRepo->find($estadoPedido->id);
        $dbEstadoPedido = $dbEstadoPedido->toArray();
        $this->assertModelData($estadoPedido->toArray(), $dbEstadoPedido);
    }

    /**
     * @test update
     */
    public function testUpdateEstadoPedido()
    {
        $estadoPedido = $this->makeEstadoPedido();
        $fakeEstadoPedido = $this->fakeEstadoPedidoData();
        $updatedEstadoPedido = $this->estadoPedidoRepo->update($fakeEstadoPedido, $estadoPedido->id);
        $this->assertModelData($fakeEstadoPedido, $updatedEstadoPedido->toArray());
        $dbEstadoPedido = $this->estadoPedidoRepo->find($estadoPedido->id);
        $this->assertModelData($fakeEstadoPedido, $dbEstadoPedido->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEstadoPedido()
    {
        $estadoPedido = $this->makeEstadoPedido();
        $resp = $this->estadoPedidoRepo->delete($estadoPedido->id);
        $this->assertTrue($resp);
        $this->assertNull(EstadoPedido::find($estadoPedido->id), 'EstadoPedido should not exist in DB');
    }
}
