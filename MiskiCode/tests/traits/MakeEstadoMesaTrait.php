<?php

use Faker\Factory as Faker;
use App\Models\EstadoMesa;
use App\Repositories\EstadoMesaRepository;

trait MakeEstadoMesaTrait
{
    /**
     * Create fake instance of EstadoMesa and save it in database
     *
     * @param array $estadoMesaFields
     * @return EstadoMesa
     */
    public function makeEstadoMesa($estadoMesaFields = [])
    {
        /** @var EstadoMesaRepository $estadoMesaRepo */
        $estadoMesaRepo = App::make(EstadoMesaRepository::class);
        $theme = $this->fakeEstadoMesaData($estadoMesaFields);
        return $estadoMesaRepo->create($theme);
    }

    /**
     * Get fake instance of EstadoMesa
     *
     * @param array $estadoMesaFields
     * @return EstadoMesa
     */
    public function fakeEstadoMesa($estadoMesaFields = [])
    {
        return new EstadoMesa($this->fakeEstadoMesaData($estadoMesaFields));
    }

    /**
     * Get fake data of EstadoMesa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEstadoMesaData($estadoMesaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'colorHexadecimal' => $fake->word
        ], $estadoMesaFields);
    }
}
