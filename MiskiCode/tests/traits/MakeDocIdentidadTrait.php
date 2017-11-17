<?php

use Faker\Factory as Faker;
use App\Models\DocIdentidad;
use App\Repositories\DocIdentidadRepository;

trait MakeDocIdentidadTrait
{
    /**
     * Create fake instance of DocIdentidad and save it in database
     *
     * @param array $docIdentidadFields
     * @return DocIdentidad
     */
    public function makeDocIdentidad($docIdentidadFields = [])
    {
        /** @var DocIdentidadRepository $docIdentidadRepo */
        $docIdentidadRepo = App::make(DocIdentidadRepository::class);
        $theme = $this->fakeDocIdentidadData($docIdentidadFields);
        return $docIdentidadRepo->create($theme);
    }

    /**
     * Get fake instance of DocIdentidad
     *
     * @param array $docIdentidadFields
     * @return DocIdentidad
     */
    public function fakeDocIdentidad($docIdentidadFields = [])
    {
        return new DocIdentidad($this->fakeDocIdentidadData($docIdentidadFields));
    }

    /**
     * Get fake data of DocIdentidad
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDocIdentidadData($docIdentidadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod' => $fake->word,
            'abrv' => $fake->word,
            'nombre' => $fake->word,
            'activo' => $fake->word
        ], $docIdentidadFields);
    }
}
