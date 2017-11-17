<?php

use App\Models\TipoComprobante;
use App\Repositories\TipoComprobanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoComprobanteRepositoryTest extends TestCase
{
    use MakeTipoComprobanteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipoComprobanteRepository
     */
    protected $tipoComprobanteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipoComprobanteRepo = App::make(TipoComprobanteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipoComprobante()
    {
        $tipoComprobante = $this->fakeTipoComprobanteData();
        $createdTipoComprobante = $this->tipoComprobanteRepo->create($tipoComprobante);
        $createdTipoComprobante = $createdTipoComprobante->toArray();
        $this->assertArrayHasKey('id', $createdTipoComprobante);
        $this->assertNotNull($createdTipoComprobante['id'], 'Created TipoComprobante must have id specified');
        $this->assertNotNull(TipoComprobante::find($createdTipoComprobante['id']), 'TipoComprobante with given id must be in DB');
        $this->assertModelData($tipoComprobante, $createdTipoComprobante);
    }

    /**
     * @test read
     */
    public function testReadTipoComprobante()
    {
        $tipoComprobante = $this->makeTipoComprobante();
        $dbTipoComprobante = $this->tipoComprobanteRepo->find($tipoComprobante->id);
        $dbTipoComprobante = $dbTipoComprobante->toArray();
        $this->assertModelData($tipoComprobante->toArray(), $dbTipoComprobante);
    }

    /**
     * @test update
     */
    public function testUpdateTipoComprobante()
    {
        $tipoComprobante = $this->makeTipoComprobante();
        $fakeTipoComprobante = $this->fakeTipoComprobanteData();
        $updatedTipoComprobante = $this->tipoComprobanteRepo->update($fakeTipoComprobante, $tipoComprobante->id);
        $this->assertModelData($fakeTipoComprobante, $updatedTipoComprobante->toArray());
        $dbTipoComprobante = $this->tipoComprobanteRepo->find($tipoComprobante->id);
        $this->assertModelData($fakeTipoComprobante, $dbTipoComprobante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipoComprobante()
    {
        $tipoComprobante = $this->makeTipoComprobante();
        $resp = $this->tipoComprobanteRepo->delete($tipoComprobante->id);
        $this->assertTrue($resp);
        $this->assertNull(TipoComprobante::find($tipoComprobante->id), 'TipoComprobante should not exist in DB');
    }
}
