<?php

use App\Models\Sujeto;
use App\Repositories\SujetoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SujetoRepositoryTest extends TestCase
{
    use MakeSujetoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SujetoRepository
     */
    protected $sujetoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sujetoRepo = App::make(SujetoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSujeto()
    {
        $sujeto = $this->fakeSujetoData();
        $createdSujeto = $this->sujetoRepo->create($sujeto);
        $createdSujeto = $createdSujeto->toArray();
        $this->assertArrayHasKey('id', $createdSujeto);
        $this->assertNotNull($createdSujeto['id'], 'Created Sujeto must have id specified');
        $this->assertNotNull(Sujeto::find($createdSujeto['id']), 'Sujeto with given id must be in DB');
        $this->assertModelData($sujeto, $createdSujeto);
    }

    /**
     * @test read
     */
    public function testReadSujeto()
    {
        $sujeto = $this->makeSujeto();
        $dbSujeto = $this->sujetoRepo->find($sujeto->id);
        $dbSujeto = $dbSujeto->toArray();
        $this->assertModelData($sujeto->toArray(), $dbSujeto);
    }

    /**
     * @test update
     */
    public function testUpdateSujeto()
    {
        $sujeto = $this->makeSujeto();
        $fakeSujeto = $this->fakeSujetoData();
        $updatedSujeto = $this->sujetoRepo->update($fakeSujeto, $sujeto->id);
        $this->assertModelData($fakeSujeto, $updatedSujeto->toArray());
        $dbSujeto = $this->sujetoRepo->find($sujeto->id);
        $this->assertModelData($fakeSujeto, $dbSujeto->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSujeto()
    {
        $sujeto = $this->makeSujeto();
        $resp = $this->sujetoRepo->delete($sujeto->id);
        $this->assertTrue($resp);
        $this->assertNull(Sujeto::find($sujeto->id), 'Sujeto should not exist in DB');
    }
}
