<?php

use Faker\Factory as Faker;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;

trait MakeEmpleadoTrait
{
    /**
     * Create fake instance of Empleado and save it in database
     *
     * @param array $empleadoFields
     * @return Empleado
     */
    public function makeEmpleado($empleadoFields = [])
    {
        /** @var EmpleadoRepository $empleadoRepo */
        $empleadoRepo = App::make(EmpleadoRepository::class);
        $theme = $this->fakeEmpleadoData($empleadoFields);
        return $empleadoRepo->create($theme);
    }

    /**
     * Get fake instance of Empleado
     *
     * @param array $empleadoFields
     * @return Empleado
     */
    public function fakeEmpleado($empleadoFields = [])
    {
        return new Empleado($this->fakeEmpleadoData($empleadoFields));
    }

    /**
     * Get fake data of Empleado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmpleadoData($empleadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'sueldo' => $fake->word,
            'fechaIngreso' => $fake->word,
            'fechaCese' => $fake->word,
            'obsv' => $fake->word,
            'activo' => $fake->word,
            'idSujeto' => $fake->randomDigitNotNull,
            'idTipoEmpleado' => $fake->randomDigitNotNull
        ], $empleadoFields);
    }
}
