<?php

use Faker\Factory as Faker;
use App\Models\TipoEmpleado;
use App\Repositories\TipoEmpleadoRepository;

trait MakeTipoEmpleadoTrait
{
    /**
     * Create fake instance of TipoEmpleado and save it in database
     *
     * @param array $tipoEmpleadoFields
     * @return TipoEmpleado
     */
    public function makeTipoEmpleado($tipoEmpleadoFields = [])
    {
        /** @var TipoEmpleadoRepository $tipoEmpleadoRepo */
        $tipoEmpleadoRepo = App::make(TipoEmpleadoRepository::class);
        $theme = $this->fakeTipoEmpleadoData($tipoEmpleadoFields);
        return $tipoEmpleadoRepo->create($theme);
    }

    /**
     * Get fake instance of TipoEmpleado
     *
     * @param array $tipoEmpleadoFields
     * @return TipoEmpleado
     */
    public function fakeTipoEmpleado($tipoEmpleadoFields = [])
    {
        return new TipoEmpleado($this->fakeTipoEmpleadoData($tipoEmpleadoFields));
    }

    /**
     * Get fake data of TipoEmpleado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipoEmpleadoData($tipoEmpleadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'descripcion' => $fake->word,
            'activo' => $fake->word
        ], $tipoEmpleadoFields);
    }
}
