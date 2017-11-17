<?php

use Faker\Factory as Faker;
use App\Models\Mesa;
use App\Repositories\MesaRepository;

trait MakeMesaTrait
{
    /**
     * Create fake instance of Mesa and save it in database
     *
     * @param array $mesaFields
     * @return Mesa
     */
    public function makeMesa($mesaFields = [])
    {
        /** @var MesaRepository $mesaRepo */
        $mesaRepo = App::make(MesaRepository::class);
        $theme = $this->fakeMesaData($mesaFields);
        return $mesaRepo->create($theme);
    }

    /**
     * Get fake instance of Mesa
     *
     * @param array $mesaFields
     * @return Mesa
     */
    public function fakeMesa($mesaFields = [])
    {
        return new Mesa($this->fakeMesaData($mesaFields));
    }

    /**
     * Get fake data of Mesa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMesaData($mesaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod' => $fake->word,
            'numComensales' => $fake->word,
            'idEstadoMesa' => $fake->randomDigitNotNull,
            'idSeccion' => $fake->randomDigitNotNull,
            'idPiso' => $fake->randomDigitNotNull
        ], $mesaFields);
    }
}
