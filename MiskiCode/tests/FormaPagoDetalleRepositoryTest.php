<?php

use App\Models\FormaPagoDetalle;
use App\Repositories\FormaPagoDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormaPagoDetalleRepositoryTest extends TestCase
{
    use MakeFormaPagoDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FormaPagoDetalleRepository
     */
    protected $formaPagoDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->formaPagoDetalleRepo = App::make(FormaPagoDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->fakeFormaPagoDetalleData();
        $createdFormaPagoDetalle = $this->formaPagoDetalleRepo->create($formaPagoDetalle);
        $createdFormaPagoDetalle = $createdFormaPagoDetalle->toArray();
        $this->assertArrayHasKey('id', $createdFormaPagoDetalle);
        $this->assertNotNull($createdFormaPagoDetalle['id'], 'Created FormaPagoDetalle must have id specified');
        $this->assertNotNull(FormaPagoDetalle::find($createdFormaPagoDetalle['id']), 'FormaPagoDetalle with given id must be in DB');
        $this->assertModelData($formaPagoDetalle, $createdFormaPagoDetalle);
    }

    /**
     * @test read
     */
    public function testReadFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->makeFormaPagoDetalle();
        $dbFormaPagoDetalle = $this->formaPagoDetalleRepo->find($formaPagoDetalle->id);
        $dbFormaPagoDetalle = $dbFormaPagoDetalle->toArray();
        $this->assertModelData($formaPagoDetalle->toArray(), $dbFormaPagoDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->makeFormaPagoDetalle();
        $fakeFormaPagoDetalle = $this->fakeFormaPagoDetalleData();
        $updatedFormaPagoDetalle = $this->formaPagoDetalleRepo->update($fakeFormaPagoDetalle, $formaPagoDetalle->id);
        $this->assertModelData($fakeFormaPagoDetalle, $updatedFormaPagoDetalle->toArray());
        $dbFormaPagoDetalle = $this->formaPagoDetalleRepo->find($formaPagoDetalle->id);
        $this->assertModelData($fakeFormaPagoDetalle, $dbFormaPagoDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFormaPagoDetalle()
    {
        $formaPagoDetalle = $this->makeFormaPagoDetalle();
        $resp = $this->formaPagoDetalleRepo->delete($formaPagoDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(FormaPagoDetalle::find($formaPagoDetalle->id), 'FormaPagoDetalle should not exist in DB');
    }
}
