<?php

use App\Models\CajaDetalle;
use App\Repositories\CajaDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CajaDetalleRepositoryTest extends TestCase
{
    use MakeCajaDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CajaDetalleRepository
     */
    protected $cajaDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cajaDetalleRepo = App::make(CajaDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCajaDetalle()
    {
        $cajaDetalle = $this->fakeCajaDetalleData();
        $createdCajaDetalle = $this->cajaDetalleRepo->create($cajaDetalle);
        $createdCajaDetalle = $createdCajaDetalle->toArray();
        $this->assertArrayHasKey('id', $createdCajaDetalle);
        $this->assertNotNull($createdCajaDetalle['id'], 'Created CajaDetalle must have id specified');
        $this->assertNotNull(CajaDetalle::find($createdCajaDetalle['id']), 'CajaDetalle with given id must be in DB');
        $this->assertModelData($cajaDetalle, $createdCajaDetalle);
    }

    /**
     * @test read
     */
    public function testReadCajaDetalle()
    {
        $cajaDetalle = $this->makeCajaDetalle();
        $dbCajaDetalle = $this->cajaDetalleRepo->find($cajaDetalle->id);
        $dbCajaDetalle = $dbCajaDetalle->toArray();
        $this->assertModelData($cajaDetalle->toArray(), $dbCajaDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateCajaDetalle()
    {
        $cajaDetalle = $this->makeCajaDetalle();
        $fakeCajaDetalle = $this->fakeCajaDetalleData();
        $updatedCajaDetalle = $this->cajaDetalleRepo->update($fakeCajaDetalle, $cajaDetalle->id);
        $this->assertModelData($fakeCajaDetalle, $updatedCajaDetalle->toArray());
        $dbCajaDetalle = $this->cajaDetalleRepo->find($cajaDetalle->id);
        $this->assertModelData($fakeCajaDetalle, $dbCajaDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCajaDetalle()
    {
        $cajaDetalle = $this->makeCajaDetalle();
        $resp = $this->cajaDetalleRepo->delete($cajaDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(CajaDetalle::find($cajaDetalle->id), 'CajaDetalle should not exist in DB');
    }
}
