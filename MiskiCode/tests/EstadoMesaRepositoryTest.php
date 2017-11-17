<?php

use App\Models\EstadoMesa;
use App\Repositories\EstadoMesaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoMesaRepositoryTest extends TestCase
{
    use MakeEstadoMesaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstadoMesaRepository
     */
    protected $estadoMesaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->estadoMesaRepo = App::make(EstadoMesaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEstadoMesa()
    {
        $estadoMesa = $this->fakeEstadoMesaData();
        $createdEstadoMesa = $this->estadoMesaRepo->create($estadoMesa);
        $createdEstadoMesa = $createdEstadoMesa->toArray();
        $this->assertArrayHasKey('id', $createdEstadoMesa);
        $this->assertNotNull($createdEstadoMesa['id'], 'Created EstadoMesa must have id specified');
        $this->assertNotNull(EstadoMesa::find($createdEstadoMesa['id']), 'EstadoMesa with given id must be in DB');
        $this->assertModelData($estadoMesa, $createdEstadoMesa);
    }

    /**
     * @test read
     */
    public function testReadEstadoMesa()
    {
        $estadoMesa = $this->makeEstadoMesa();
        $dbEstadoMesa = $this->estadoMesaRepo->find($estadoMesa->id);
        $dbEstadoMesa = $dbEstadoMesa->toArray();
        $this->assertModelData($estadoMesa->toArray(), $dbEstadoMesa);
    }

    /**
     * @test update
     */
    public function testUpdateEstadoMesa()
    {
        $estadoMesa = $this->makeEstadoMesa();
        $fakeEstadoMesa = $this->fakeEstadoMesaData();
        $updatedEstadoMesa = $this->estadoMesaRepo->update($fakeEstadoMesa, $estadoMesa->id);
        $this->assertModelData($fakeEstadoMesa, $updatedEstadoMesa->toArray());
        $dbEstadoMesa = $this->estadoMesaRepo->find($estadoMesa->id);
        $this->assertModelData($fakeEstadoMesa, $dbEstadoMesa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEstadoMesa()
    {
        $estadoMesa = $this->makeEstadoMesa();
        $resp = $this->estadoMesaRepo->delete($estadoMesa->id);
        $this->assertTrue($resp);
        $this->assertNull(EstadoMesa::find($estadoMesa->id), 'EstadoMesa should not exist in DB');
    }
}
