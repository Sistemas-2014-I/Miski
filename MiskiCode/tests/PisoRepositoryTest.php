<?php

use App\Models\Piso;
use App\Repositories\PisoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PisoRepositoryTest extends TestCase
{
    use MakePisoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PisoRepository
     */
    protected $pisoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pisoRepo = App::make(PisoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePiso()
    {
        $piso = $this->fakePisoData();
        $createdPiso = $this->pisoRepo->create($piso);
        $createdPiso = $createdPiso->toArray();
        $this->assertArrayHasKey('id', $createdPiso);
        $this->assertNotNull($createdPiso['id'], 'Created Piso must have id specified');
        $this->assertNotNull(Piso::find($createdPiso['id']), 'Piso with given id must be in DB');
        $this->assertModelData($piso, $createdPiso);
    }

    /**
     * @test read
     */
    public function testReadPiso()
    {
        $piso = $this->makePiso();
        $dbPiso = $this->pisoRepo->find($piso->id);
        $dbPiso = $dbPiso->toArray();
        $this->assertModelData($piso->toArray(), $dbPiso);
    }

    /**
     * @test update
     */
    public function testUpdatePiso()
    {
        $piso = $this->makePiso();
        $fakePiso = $this->fakePisoData();
        $updatedPiso = $this->pisoRepo->update($fakePiso, $piso->id);
        $this->assertModelData($fakePiso, $updatedPiso->toArray());
        $dbPiso = $this->pisoRepo->find($piso->id);
        $this->assertModelData($fakePiso, $dbPiso->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePiso()
    {
        $piso = $this->makePiso();
        $resp = $this->pisoRepo->delete($piso->id);
        $this->assertTrue($resp);
        $this->assertNull(Piso::find($piso->id), 'Piso should not exist in DB');
    }
}
