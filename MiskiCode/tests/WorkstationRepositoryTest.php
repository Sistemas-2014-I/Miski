<?php

use App\Models\Workstation;
use App\Repositories\WorkstationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkstationRepositoryTest extends TestCase
{
    use MakeWorkstationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WorkstationRepository
     */
    protected $workstationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->workstationRepo = App::make(WorkstationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWorkstation()
    {
        $workstation = $this->fakeWorkstationData();
        $createdWorkstation = $this->workstationRepo->create($workstation);
        $createdWorkstation = $createdWorkstation->toArray();
        $this->assertArrayHasKey('id', $createdWorkstation);
        $this->assertNotNull($createdWorkstation['id'], 'Created Workstation must have id specified');
        $this->assertNotNull(Workstation::find($createdWorkstation['id']), 'Workstation with given id must be in DB');
        $this->assertModelData($workstation, $createdWorkstation);
    }

    /**
     * @test read
     */
    public function testReadWorkstation()
    {
        $workstation = $this->makeWorkstation();
        $dbWorkstation = $this->workstationRepo->find($workstation->id);
        $dbWorkstation = $dbWorkstation->toArray();
        $this->assertModelData($workstation->toArray(), $dbWorkstation);
    }

    /**
     * @test update
     */
    public function testUpdateWorkstation()
    {
        $workstation = $this->makeWorkstation();
        $fakeWorkstation = $this->fakeWorkstationData();
        $updatedWorkstation = $this->workstationRepo->update($fakeWorkstation, $workstation->id);
        $this->assertModelData($fakeWorkstation, $updatedWorkstation->toArray());
        $dbWorkstation = $this->workstationRepo->find($workstation->id);
        $this->assertModelData($fakeWorkstation, $dbWorkstation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWorkstation()
    {
        $workstation = $this->makeWorkstation();
        $resp = $this->workstationRepo->delete($workstation->id);
        $this->assertTrue($resp);
        $this->assertNull(Workstation::find($workstation->id), 'Workstation should not exist in DB');
    }
}
