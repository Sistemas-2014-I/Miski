<?php

use Faker\Factory as Faker;
use App\Models\Piso;
use App\Repositories\PisoRepository;

trait MakePisoTrait
{
    /**
     * Create fake instance of Piso and save it in database
     *
     * @param array $pisoFields
     * @return Piso
     */
    public function makePiso($pisoFields = [])
    {
        /** @var PisoRepository $pisoRepo */
        $pisoRepo = App::make(PisoRepository::class);
        $theme = $this->fakePisoData($pisoFields);
        return $pisoRepo->create($theme);
    }

    /**
     * Get fake instance of Piso
     *
     * @param array $pisoFields
     * @return Piso
     */
    public function fakePiso($pisoFields = [])
    {
        return new Piso($this->fakePisoData($pisoFields));
    }

    /**
     * Get fake data of Piso
     *
     * @param array $postFields
     * @return array
     */
    public function fakePisoData($pisoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod' => $fake->word,
            'descripcion' => $fake->word,
            'activo' => $fake->word
        ], $pisoFields);
    }
}
