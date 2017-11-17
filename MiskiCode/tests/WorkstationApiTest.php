<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkstationApiTest extends TestCase
{
    use MakeWorkstationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWorkstation()
    {
        $workstation = $this->fakeWorkstationData();
        $this->json('POST', '/api/v1/workstations', $workstation);

        $this->assertApiResponse($workstation);
    }

    /**
     * @test
     */
    public function testReadWorkstation()
    {
        $workstation = $this->makeWorkstation();
        $this->json('GET', '/api/v1/workstations/'.$workstation->id);

        $this->assertApiResponse($workstation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWorkstation()
    {
        $workstation = $this->makeWorkstation();
        $editedWorkstation = $this->fakeWorkstationData();

        $this->json('PUT', '/api/v1/workstations/'.$workstation->id, $editedWorkstation);

        $this->assertApiResponse($editedWorkstation);
    }

    /**
     * @test
     */
    public function testDeleteWorkstation()
    {
        $workstation = $this->makeWorkstation();
        $this->json('DELETE', '/api/v1/workstations/'.$workstation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/workstations/'.$workstation->id);

        $this->assertResponseStatus(404);
    }
}
