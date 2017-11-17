<?php

use App\Models\Comprobante;
use App\Repositories\ComprobanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComprobanteRepositoryTest extends TestCase
{
    use MakeComprobanteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComprobanteRepository
     */
    protected $comprobanteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comprobanteRepo = App::make(ComprobanteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateComprobante()
    {
        $comprobante = $this->fakeComprobanteData();
        $createdComprobante = $this->comprobanteRepo->create($comprobante);
        $createdComprobante = $createdComprobante->toArray();
        $this->assertArrayHasKey('id', $createdComprobante);
        $this->assertNotNull($createdComprobante['id'], 'Created Comprobante must have id specified');
        $this->assertNotNull(Comprobante::find($createdComprobante['id']), 'Comprobante with given id must be in DB');
        $this->assertModelData($comprobante, $createdComprobante);
    }

    /**
     * @test read
     */
    public function testReadComprobante()
    {
        $comprobante = $this->makeComprobante();
        $dbComprobante = $this->comprobanteRepo->find($comprobante->id);
        $dbComprobante = $dbComprobante->toArray();
        $this->assertModelData($comprobante->toArray(), $dbComprobante);
    }

    /**
     * @test update
     */
    public function testUpdateComprobante()
    {
        $comprobante = $this->makeComprobante();
        $fakeComprobante = $this->fakeComprobanteData();
        $updatedComprobante = $this->comprobanteRepo->update($fakeComprobante, $comprobante->id);
        $this->assertModelData($fakeComprobante, $updatedComprobante->toArray());
        $dbComprobante = $this->comprobanteRepo->find($comprobante->id);
        $this->assertModelData($fakeComprobante, $dbComprobante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteComprobante()
    {
        $comprobante = $this->makeComprobante();
        $resp = $this->comprobanteRepo->delete($comprobante->id);
        $this->assertTrue($resp);
        $this->assertNull(Comprobante::find($comprobante->id), 'Comprobante should not exist in DB');
    }
}
