<?php

use Faker\Factory as Faker;
use App\Models\Sujeto;
use App\Repositories\SujetoRepository;

trait MakeSujetoTrait
{
    /**
     * Create fake instance of Sujeto and save it in database
     *
     * @param array $sujetoFields
     * @return Sujeto
     */
    public function makeSujeto($sujetoFields = [])
    {
        /** @var SujetoRepository $sujetoRepo */
        $sujetoRepo = App::make(SujetoRepository::class);
        $theme = $this->fakeSujetoData($sujetoFields);
        return $sujetoRepo->create($theme);
    }

    /**
     * Get fake instance of Sujeto
     *
     * @param array $sujetoFields
     * @return Sujeto
     */
    public function fakeSujeto($sujetoFields = [])
    {
        return new Sujeto($this->fakeSujetoData($sujetoFields));
    }

    /**
     * Get fake data of Sujeto
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSujetoData($sujetoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'apellidoMaterno' => $fake->word,
            'apellidoPaterno' => $fake->word,
            'numDoc' => $fake->word,
            'telefono' => $fake->word,
            'correo' => $fake->word,
            'masculino' => $fake->word,
            'direccion' => $fake->word,
            'avatar' => $fake->word,
            'idDocIdentidad' => $fake->randomDigitNotNull
        ], $sujetoFields);
    }
}
