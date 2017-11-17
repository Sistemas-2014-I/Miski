<?php

use App\Models\FormaPago;
use App\Repositories\FormaPagoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormaPagoRepositoryTest extends TestCase
{
    use MakeFormaPagoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FormaPagoRepository
     */
    protected $formaPagoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->formaPagoRepo = App::make(FormaPagoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFormaPago()
    {
        $formaPago = $this->fakeFormaPagoData();
        $createdFormaPago = $this->formaPagoRepo->create($formaPago);
        $createdFormaPago = $createdFormaPago->toArray();
        $this->assertArrayHasKey('id', $createdFormaPago);
        $this->assertNotNull($createdFormaPago['id'], 'Created FormaPago must have id specified');
        $this->assertNotNull(FormaPago::find($createdFormaPago['id']), 'FormaPago with given id must be in DB');
        $this->assertModelData($formaPago, $createdFormaPago);
    }

    /**
     * @test read
     */
    public function testReadFormaPago()
    {
        $formaPago = $this->makeFormaPago();
        $dbFormaPago = $this->formaPagoRepo->find($formaPago->id);
        $dbFormaPago = $dbFormaPago->toArray();
        $this->assertModelData($formaPago->toArray(), $dbFormaPago);
    }

    /**
     * @test update
     */
    public function testUpdateFormaPago()
    {
        $formaPago = $this->makeFormaPago();
        $fakeFormaPago = $this->fakeFormaPagoData();
        $updatedFormaPago = $this->formaPagoRepo->update($fakeFormaPago, $formaPago->id);
        $this->assertModelData($fakeFormaPago, $updatedFormaPago->toArray());
        $dbFormaPago = $this->formaPagoRepo->find($formaPago->id);
        $this->assertModelData($fakeFormaPago, $dbFormaPago->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFormaPago()
    {
        $formaPago = $this->makeFormaPago();
        $resp = $this->formaPagoRepo->delete($formaPago->id);
        $this->assertTrue($resp);
        $this->assertNull(FormaPago::find($formaPago->id), 'FormaPago should not exist in DB');
    }
}
