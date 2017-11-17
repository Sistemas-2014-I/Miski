<?php

use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmpleadoRepositoryTest extends TestCase
{
    use MakeEmpleadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmpleadoRepository
     */
    protected $empleadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->empleadoRepo = App::make(EmpleadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEmpleado()
    {
        $empleado = $this->fakeEmpleadoData();
        $createdEmpleado = $this->empleadoRepo->create($empleado);
        $createdEmpleado = $createdEmpleado->toArray();
        $this->assertArrayHasKey('id', $createdEmpleado);
        $this->assertNotNull($createdEmpleado['id'], 'Created Empleado must have id specified');
        $this->assertNotNull(Empleado::find($createdEmpleado['id']), 'Empleado with given id must be in DB');
        $this->assertModelData($empleado, $createdEmpleado);
    }

    /**
     * @test read
     */
    public function testReadEmpleado()
    {
        $empleado = $this->makeEmpleado();
        $dbEmpleado = $this->empleadoRepo->find($empleado->id);
        $dbEmpleado = $dbEmpleado->toArray();
        $this->assertModelData($empleado->toArray(), $dbEmpleado);
    }

    /**
     * @test update
     */
    public function testUpdateEmpleado()
    {
        $empleado = $this->makeEmpleado();
        $fakeEmpleado = $this->fakeEmpleadoData();
        $updatedEmpleado = $this->empleadoRepo->update($fakeEmpleado, $empleado->id);
        $this->assertModelData($fakeEmpleado, $updatedEmpleado->toArray());
        $dbEmpleado = $this->empleadoRepo->find($empleado->id);
        $this->assertModelData($fakeEmpleado, $dbEmpleado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEmpleado()
    {
        $empleado = $this->makeEmpleado();
        $resp = $this->empleadoRepo->delete($empleado->id);
        $this->assertTrue($resp);
        $this->assertNull(Empleado::find($empleado->id), 'Empleado should not exist in DB');
    }
}
