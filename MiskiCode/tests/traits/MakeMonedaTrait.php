<?php

use Faker\Factory as Faker;
use App\Models\Moneda;
use App\Repositories\MonedaRepository;

trait MakeMonedaTrait
{
    /**
     * Create fake instance of Moneda and save it in database
     *
     * @param array $monedaFields
     * @return Moneda
     */
    public function makeMoneda($monedaFields = [])
    {
        /** @var MonedaRepository $monedaRepo */
        $monedaRepo = App::make(MonedaRepository::class);
        $theme = $this->fakeMonedaData($monedaFields);
        return $monedaRepo->create($theme);
    }

    /**
     * Get fake instance of Moneda
     *
     * @param array $monedaFields
     * @return Moneda
     */
    public function fakeMoneda($monedaFields = [])
    {
        return new Moneda($this->fakeMonedaData($monedaFields));
    }

    /**
     * Get fake data of Moneda
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMonedaData($monedaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'codIso' => $fake->word,
            'nombre' => $fake->word,
            'simbolo' => $fake->word
        ], $monedaFields);
    }
}
