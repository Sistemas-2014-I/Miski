<?php

use App\Models\TipoEmpleado;
use App\Repositories\TipoEmpleadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoEmpleadoRepositoryTest extends TestCase
{
    use MakeTipoEmpleadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipoEmpleadoRepository
     */
    protected $tipoEmpleadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipoEmpleadoRepo = App::make(TipoEmpleadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipoEmpleado()
    {
        $tipoEmpleado = $this->fakeTipoEmpleadoData();
        $createdTipoEmpleado = $this->tipoEmpleadoRepo->create($tipoEmpleado);
        $createdTipoEmpleado = $createdTipoEmpleado->toArray();
        $this->assertArrayHasKey('id', $createdTipoEmpleado);
        $this->assertNotNull($createdTipoEmpleado['id'], 'Created TipoEmpleado must have id specified');
        $this->assertNotNull(TipoEmpleado::find($createdTipoEmpleado['id']), 'TipoEmpleado with given id must be in DB');
        $this->assertModelData($tipoEmpleado, $createdTipoEmpleado);
    }

    /**
     * @test read
     */
    public function testReadTipoEmpleado()
    {
        $tipoEmpleado = $this->makeTipoEmpleado();
        $dbTipoEmpleado = $this->tipoEmpleadoRepo->find($tipoEmpleado->id);
        $dbTipoEmpleado = $dbTipoEmpleado->toArray();
        $this->assertModelData($tipoEmpleado->toArray(), $dbTipoEmpleado);
    }

    /**
     * @test update
     */
    public function testUpdateTipoEmpleado()
    {
        $tipoEmpleado = $this->makeTipoEmpleado();
        $fakeTipoEmpleado = $this->fakeTipoEmpleadoData();
        $updatedTipoEmpleado = $this->tipoEmpleadoRepo->update($fakeTipoEmpleado, $tipoEmpleado->id);
        $this->assertModelData($fakeTipoEmpleado, $updatedTipoEmpleado->toArray());
        $dbTipoEmpleado = $this->tipoEmpleadoRepo->find($tipoEmpleado->id);
        $this->assertModelData($fakeTipoEmpleado, $dbTipoEmpleado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipoEmpleado()
    {
        $tipoEmpleado = $this->makeTipoEmpleado();
        $resp = $this->tipoEmpleadoRepo->delete($tipoEmpleado->id);
        $this->assertTrue($resp);
        $this->assertNull(TipoEmpleado::find($tipoEmpleado->id), 'TipoEmpleado should not exist in DB');
    }
}
