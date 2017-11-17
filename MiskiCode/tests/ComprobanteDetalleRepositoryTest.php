<?php

use App\Models\ComprobanteDetalle;
use App\Repositories\ComprobanteDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComprobanteDetalleRepositoryTest extends TestCase
{
    use MakeComprobanteDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComprobanteDetalleRepository
     */
    protected $comprobanteDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comprobanteDetalleRepo = App::make(ComprobanteDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateComprobanteDetalle()
    {
        $comprobanteDetalle = $this->fakeComprobanteDetalleData();
        $createdComprobanteDetalle = $this->comprobanteDetalleRepo->create($comprobanteDetalle);
        $createdComprobanteDetalle = $createdComprobanteDetalle->toArray();
        $this->assertArrayHasKey('id', $createdComprobanteDetalle);
        $this->assertNotNull($createdComprobanteDetalle['id'], 'Created ComprobanteDetalle must have id specified');
        $this->assertNotNull(ComprobanteDetalle::find($createdComprobanteDetalle['id']), 'ComprobanteDetalle with given id must be in DB');
        $this->assertModelData($comprobanteDetalle, $createdComprobanteDetalle);
    }

    /**
     * @test read
     */
    public function testReadComprobanteDetalle()
    {
        $comprobanteDetalle = $this->makeComprobanteDetalle();
        $dbComprobanteDetalle = $this->comprobanteDetalleRepo->find($comprobanteDetalle->id);
        $dbComprobanteDetalle = $dbComprobanteDetalle->toArray();
        $this->assertModelData($comprobanteDetalle->toArray(), $dbComprobanteDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateComprobanteDetalle()
    {
        $comprobanteDetalle = $this->makeComprobanteDetalle();
        $fakeComprobanteDetalle = $this->fakeComprobanteDetalleData();
        $updatedComprobanteDetalle = $this->comprobanteDetalleRepo->update($fakeComprobanteDetalle, $comprobanteDetalle->id);
        $this->assertModelData($fakeComprobanteDetalle, $updatedComprobanteDetalle->toArray());
        $dbComprobanteDetalle = $this->comprobanteDetalleRepo->find($comprobanteDetalle->id);
        $this->assertModelData($fakeComprobanteDetalle, $dbComprobanteDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteComprobanteDetalle()
    {
        $comprobanteDetalle = $this->makeComprobanteDetalle();
        $resp = $this->comprobanteDetalleRepo->delete($comprobanteDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(ComprobanteDetalle::find($comprobanteDetalle->id), 'ComprobanteDetalle should not exist in DB');
    }
}
