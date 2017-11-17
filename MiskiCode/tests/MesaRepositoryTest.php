<?php

use App\Models\Mesa;
use App\Repositories\MesaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MesaRepositoryTest extends TestCase
{
    use MakeMesaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MesaRepository
     */
    protected $mesaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->mesaRepo = App::make(MesaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMesa()
    {
        $mesa = $this->fakeMesaData();
        $createdMesa = $this->mesaRepo->create($mesa);
        $createdMesa = $createdMesa->toArray();
        $this->assertArrayHasKey('id', $createdMesa);
        $this->assertNotNull($createdMesa['id'], 'Created Mesa must have id specified');
        $this->assertNotNull(Mesa::find($createdMesa['id']), 'Mesa with given id must be in DB');
        $this->assertModelData($mesa, $createdMesa);
    }

    /**
     * @test read
     */
    public function testReadMesa()
    {
        $mesa = $this->makeMesa();
        $dbMesa = $this->mesaRepo->find($mesa->id);
        $dbMesa = $dbMesa->toArray();
        $this->assertModelData($mesa->toArray(), $dbMesa);
    }

    /**
     * @test update
     */
    public function testUpdateMesa()
    {
        $mesa = $this->makeMesa();
        $fakeMesa = $this->fakeMesaData();
        $updatedMesa = $this->mesaRepo->update($fakeMesa, $mesa->id);
        $this->assertModelData($fakeMesa, $updatedMesa->toArray());
        $dbMesa = $this->mesaRepo->find($mesa->id);
        $this->assertModelData($fakeMesa, $dbMesa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMesa()
    {
        $mesa = $this->makeMesa();
        $resp = $this->mesaRepo->delete($mesa->id);
        $this->assertTrue($resp);
        $this->assertNull(Mesa::find($mesa->id), 'Mesa should not exist in DB');
    }
}
