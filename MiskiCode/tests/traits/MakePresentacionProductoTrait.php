<?php

use Faker\Factory as Faker;
use App\Models\PresentacionProducto;
use App\Repositories\PresentacionProductoRepository;

trait MakePresentacionProductoTrait
{
    /**
     * Create fake instance of PresentacionProducto and save it in database
     *
     * @param array $presentacionProductoFields
     * @return PresentacionProducto
     */
    public function makePresentacionProducto($presentacionProductoFields = [])
    {
        /** @var PresentacionProductoRepository $presentacionProductoRepo */
        $presentacionProductoRepo = App::make(PresentacionProductoRepository::class);
        $theme = $this->fakePresentacionProductoData($presentacionProductoFields);
        return $presentacionProductoRepo->create($theme);
    }

    /**
     * Get fake instance of PresentacionProducto
     *
     * @param array $presentacionProductoFields
     * @return PresentacionProducto
     */
    public function fakePresentacionProducto($presentacionProductoFields = [])
    {
        return new PresentacionProducto($this->fakePresentacionProductoData($presentacionProductoFields));
    }

    /**
     * Get fake data of PresentacionProducto
     *
     * @param array $postFields
     * @return array
     */
    public function fakePresentacionProductoData($presentacionProductoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'mtoPrecio' => $fake->word,
            'activo' => $fake->word,
            'idProducto' => $fake->randomDigitNotNull,
            'idPresentacion' => $fake->randomDigitNotNull,
            'idMoneda' => $fake->randomDigitNotNull
        ], $presentacionProductoFields);
    }
}
