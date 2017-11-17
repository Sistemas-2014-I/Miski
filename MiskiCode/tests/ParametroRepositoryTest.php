<?php

use App\Models\Parametro;
use App\Repositories\ParametroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParametroRepositoryTest extends TestCase
{
    use MakeParametroTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParametroRepository
     */
    protected $parametroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->parametroRepo = App::make(ParametroRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateParametro()
    {
        $parametro = $this->fakeParametroData();
        $createdParametro = $this->parametroRepo->create($parametro);
        $createdParametro = $createdParametro->toArray();
        $this->assertArrayHasKey('id', $createdParametro);
        $this->assertNotNull($createdParametro['id'], 'Created Parametro must have id specified');
        $this->assertNotNull(Parametro::find($createdParametro['id']), 'Parametro with given id must be in DB');
        $this->assertModelData($parametro, $createdParametro);
    }

    /**
     * @test read
     */
    public function testReadParametro()
    {
        $parametro = $this->makeParametro();
        $dbParametro = $this->parametroRepo->find($parametro->id);
        $dbParametro = $dbParametro->toArray();
        $this->assertModelData($parametro->toArray(), $dbParametro);
    }

    /**
     * @test update
     */
    public function testUpdateParametro()
    {
        $parametro = $this->makeParametro();
        $fakeParametro = $this->fakeParametroData();
        $updatedParametro = $this->parametroRepo->update($fakeParametro, $parametro->id);
        $this->assertModelData($fakeParametro, $updatedParametro->toArray());
        $dbParametro = $this->parametroRepo->find($parametro->id);
        $this->assertModelData($fakeParametro, $dbParametro->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteParametro()
    {
        $parametro = $this->makeParametro();
        $resp = $this->parametroRepo->delete($parametro->id);
        $this->assertTrue($resp);
        $this->assertNull(Parametro::find($parametro->id), 'Parametro should not exist in DB');
    }
}
