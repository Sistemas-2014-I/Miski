<?php

use App\Models\PresentacionProducto;
use App\Repositories\PresentacionProductoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresentacionProductoRepositoryTest extends TestCase
{
    use MakePresentacionProductoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PresentacionProductoRepository
     */
    protected $presentacionProductoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->presentacionProductoRepo = App::make(PresentacionProductoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePresentacionProducto()
    {
        $presentacionProducto = $this->fakePresentacionProductoData();
        $createdPresentacionProducto = $this->presentacionProductoRepo->create($presentacionProducto);
        $createdPresentacionProducto = $createdPresentacionProducto->toArray();
        $this->assertArrayHasKey('id', $createdPresentacionProducto);
        $this->assertNotNull($createdPresentacionProducto['id'], 'Created PresentacionProducto must have id specified');
        $this->assertNotNull(PresentacionProducto::find($createdPresentacionProducto['id']), 'PresentacionProducto with given id must be in DB');
        $this->assertModelData($presentacionProducto, $createdPresentacionProducto);
    }

    /**
     * @test read
     */
    public function testReadPresentacionProducto()
    {
        $presentacionProducto = $this->makePresentacionProducto();
        $dbPresentacionProducto = $this->presentacionProductoRepo->find($presentacionProducto->id);
        $dbPresentacionProducto = $dbPresentacionProducto->toArray();
        $this->assertModelData($presentacionProducto->toArray(), $dbPresentacionProducto);
    }

    /**
     * @test update
     */
    public function testUpdatePresentacionProducto()
    {
        $presentacionProducto = $this->makePresentacionProducto();
        $fakePresentacionProducto = $this->fakePresentacionProductoData();
        $updatedPresentacionProducto = $this->presentacionProductoRepo->update($fakePresentacionProducto, $presentacionProducto->id);
        $this->assertModelData($fakePresentacionProducto, $updatedPresentacionProducto->toArray());
        $dbPresentacionProducto = $this->presentacionProductoRepo->find($presentacionProducto->id);
        $this->assertModelData($fakePresentacionProducto, $dbPresentacionProducto->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePresentacionProducto()
    {
        $presentacionProducto = $this->makePresentacionProducto();
        $resp = $this->presentacionProductoRepo->delete($presentacionProducto->id);
        $this->assertTrue($resp);
        $this->assertNull(PresentacionProducto::find($presentacionProducto->id), 'PresentacionProducto should not exist in DB');
    }
}
