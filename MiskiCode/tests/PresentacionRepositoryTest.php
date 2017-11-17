<?php

use App\Models\Presentacion;
use App\Repositories\PresentacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresentacionRepositoryTest extends TestCase
{
    use MakePresentacionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PresentacionRepository
     */
    protected $presentacionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->presentacionRepo = App::make(PresentacionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePresentacion()
    {
        $presentacion = $this->fakePresentacionData();
        $createdPresentacion = $this->presentacionRepo->create($presentacion);
        $createdPresentacion = $createdPresentacion->toArray();
        $this->assertArrayHasKey('id', $createdPresentacion);
        $this->assertNotNull($createdPresentacion['id'], 'Created Presentacion must have id specified');
        $this->assertNotNull(Presentacion::find($createdPresentacion['id']), 'Presentacion with given id must be in DB');
        $this->assertModelData($presentacion, $createdPresentacion);
    }

    /**
     * @test read
     */
    public function testReadPresentacion()
    {
        $presentacion = $this->makePresentacion();
        $dbPresentacion = $this->presentacionRepo->find($presentacion->id);
        $dbPresentacion = $dbPresentacion->toArray();
        $this->assertModelData($presentacion->toArray(), $dbPresentacion);
    }

    /**
     * @test update
     */
    public function testUpdatePresentacion()
    {
        $presentacion = $this->makePresentacion();
        $fakePresentacion = $this->fakePresentacionData();
        $updatedPresentacion = $this->presentacionRepo->update($fakePresentacion, $presentacion->id);
        $this->assertModelData($fakePresentacion, $updatedPresentacion->toArray());
        $dbPresentacion = $this->presentacionRepo->find($presentacion->id);
        $this->assertModelData($fakePresentacion, $dbPresentacion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePresentacion()
    {
        $presentacion = $this->makePresentacion();
        $resp = $this->presentacionRepo->delete($presentacion->id);
        $this->assertTrue($resp);
        $this->assertNull(Presentacion::find($presentacion->id), 'Presentacion should not exist in DB');
    }
}
