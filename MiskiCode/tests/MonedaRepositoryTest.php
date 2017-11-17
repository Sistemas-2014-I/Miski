<?php

use App\Models\Moneda;
use App\Repositories\MonedaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MonedaRepositoryTest extends TestCase
{
    use MakeMonedaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MonedaRepository
     */
    protected $monedaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->monedaRepo = App::make(MonedaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMoneda()
    {
        $moneda = $this->fakeMonedaData();
        $createdMoneda = $this->monedaRepo->create($moneda);
        $createdMoneda = $createdMoneda->toArray();
        $this->assertArrayHasKey('id', $createdMoneda);
        $this->assertNotNull($createdMoneda['id'], 'Created Moneda must have id specified');
        $this->assertNotNull(Moneda::find($createdMoneda['id']), 'Moneda with given id must be in DB');
        $this->assertModelData($moneda, $createdMoneda);
    }

    /**
     * @test read
     */
    public function testReadMoneda()
    {
        $moneda = $this->makeMoneda();
        $dbMoneda = $this->monedaRepo->find($moneda->id);
        $dbMoneda = $dbMoneda->toArray();
        $this->assertModelData($moneda->toArray(), $dbMoneda);
    }

    /**
     * @test update
     */
    public function testUpdateMoneda()
    {
        $moneda = $this->makeMoneda();
        $fakeMoneda = $this->fakeMonedaData();
        $updatedMoneda = $this->monedaRepo->update($fakeMoneda, $moneda->id);
        $this->assertModelData($fakeMoneda, $updatedMoneda->toArray());
        $dbMoneda = $this->monedaRepo->find($moneda->id);
        $this->assertModelData($fakeMoneda, $dbMoneda->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMoneda()
    {
        $moneda = $this->makeMoneda();
        $resp = $this->monedaRepo->delete($moneda->id);
        $this->assertTrue($resp);
        $this->assertNull(Moneda::find($moneda->id), 'Moneda should not exist in DB');
    }
}
