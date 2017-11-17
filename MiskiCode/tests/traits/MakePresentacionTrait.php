<?php

use Faker\Factory as Faker;
use App\Models\Presentacion;
use App\Repositories\PresentacionRepository;

trait MakePresentacionTrait
{
    /**
     * Create fake instance of Presentacion and save it in database
     *
     * @param array $presentacionFields
     * @return Presentacion
     */
    public function makePresentacion($presentacionFields = [])
    {
        /** @var PresentacionRepository $presentacionRepo */
        $presentacionRepo = App::make(PresentacionRepository::class);
        $theme = $this->fakePresentacionData($presentacionFields);
        return $presentacionRepo->create($theme);
    }

    /**
     * Get fake instance of Presentacion
     *
     * @param array $presentacionFields
     * @return Presentacion
     */
    public function fakePresentacion($presentacionFields = [])
    {
        return new Presentacion($this->fakePresentacionData($presentacionFields));
    }

    /**
     * Get fake data of Presentacion
     *
     * @param array $postFields
     * @return array
     */
    public function fakePresentacionData($presentacionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'activo' => $fake->word
        ], $presentacionFields);
    }
}
