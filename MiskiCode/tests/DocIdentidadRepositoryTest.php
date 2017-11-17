<?php

use App\Models\DocIdentidad;
use App\Repositories\DocIdentidadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocIdentidadRepositoryTest extends TestCase
{
    use MakeDocIdentidadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DocIdentidadRepository
     */
    protected $docIdentidadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->docIdentidadRepo = App::make(DocIdentidadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDocIdentidad()
    {
        $docIdentidad = $this->fakeDocIdentidadData();
        $createdDocIdentidad = $this->docIdentidadRepo->create($docIdentidad);
        $createdDocIdentidad = $createdDocIdentidad->toArray();
        $this->assertArrayHasKey('id', $createdDocIdentidad);
        $this->assertNotNull($createdDocIdentidad['id'], 'Created DocIdentidad must have id specified');
        $this->assertNotNull(DocIdentidad::find($createdDocIdentidad['id']), 'DocIdentidad with given id must be in DB');
        $this->assertModelData($docIdentidad, $createdDocIdentidad);
    }

    /**
     * @test read
     */
    public function testReadDocIdentidad()
    {
        $docIdentidad = $this->makeDocIdentidad();
        $dbDocIdentidad = $this->docIdentidadRepo->find($docIdentidad->id);
        $dbDocIdentidad = $dbDocIdentidad->toArray();
        $this->assertModelData($docIdentidad->toArray(), $dbDocIdentidad);
    }

    /**
     * @test update
     */
    public function testUpdateDocIdentidad()
    {
        $docIdentidad = $this->makeDocIdentidad();
        $fakeDocIdentidad = $this->fakeDocIdentidadData();
        $updatedDocIdentidad = $this->docIdentidadRepo->update($fakeDocIdentidad, $docIdentidad->id);
        $this->assertModelData($fakeDocIdentidad, $updatedDocIdentidad->toArray());
        $dbDocIdentidad = $this->docIdentidadRepo->find($docIdentidad->id);
        $this->assertModelData($fakeDocIdentidad, $dbDocIdentidad->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDocIdentidad()
    {
        $docIdentidad = $this->makeDocIdentidad();
        $resp = $this->docIdentidadRepo->delete($docIdentidad->id);
        $this->assertTrue($resp);
        $this->assertNull(DocIdentidad::find($docIdentidad->id), 'DocIdentidad should not exist in DB');
    }
}
