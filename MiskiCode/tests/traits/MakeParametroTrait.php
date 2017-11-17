<?php

use Faker\Factory as Faker;
use App\Models\Parametro;
use App\Repositories\ParametroRepository;

trait MakeParametroTrait
{
    /**
     * Create fake instance of Parametro and save it in database
     *
     * @param array $parametroFields
     * @return Parametro
     */
    public function makeParametro($parametroFields = [])
    {
        /** @var ParametroRepository $parametroRepo */
        $parametroRepo = App::make(ParametroRepository::class);
        $theme = $this->fakeParametroData($parametroFields);
        return $parametroRepo->create($theme);
    }

    /**
     * Get fake instance of Parametro
     *
     * @param array $parametroFields
     * @return Parametro
     */
    public function fakeParametro($parametroFields = [])
    {
        return new Parametro($this->fakeParametroData($parametroFields));
    }

    /**
     * Get fake data of Parametro
     *
     * @param array $postFields
     * @return array
     */
    public function fakeParametroData($parametroFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'valor' => $fake->word,
            'descripcion' => $fake->word
        ], $parametroFields);
    }
}
