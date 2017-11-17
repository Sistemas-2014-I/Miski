<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmpleadoApiTest extends TestCase
{
    use MakeEmpleadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEmpleado()
    {
        $empleado = $this->fakeEmpleadoData();
        $this->json('POST', '/api/v1/empleados', $empleado);

        $this->assertApiResponse($empleado);
    }

    /**
     * @test
     */
    public function testReadEmpleado()
    {
        $empleado = $this->makeEmpleado();
        $this->json('GET', '/api/v1/empleados/'.$empleado->id);

        $this->assertApiResponse($empleado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEmpleado()
    {
        $empleado = $this->makeEmpleado();
        $editedEmpleado = $this->fakeEmpleadoData();

        $this->json('PUT', '/api/v1/empleados/'.$empleado->id, $editedEmpleado);

        $this->assertApiResponse($editedEmpleado);
    }

    /**
     * @test
     */
    public function testDeleteEmpleado()
    {
        $empleado = $this->makeEmpleado();
        $this->json('DELETE', '/api/v1/empleados/'.$empleado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/empleados/'.$empleado->id);

        $this->assertResponseStatus(404);
    }
}
