<?php

use Faker\Factory as Faker;
use App\Models\ComprobanteDetalle;
use App\Repositories\ComprobanteDetalleRepository;

trait MakeComprobanteDetalleTrait
{
    /**
     * Create fake instance of ComprobanteDetalle and save it in database
     *
     * @param array $comprobanteDetalleFields
     * @return ComprobanteDetalle
     */
    public function makeComprobanteDetalle($comprobanteDetalleFields = [])
    {
        /** @var ComprobanteDetalleRepository $comprobanteDetalleRepo */
        $comprobanteDetalleRepo = App::make(ComprobanteDetalleRepository::class);
        $theme = $this->fakeComprobanteDetalleData($comprobanteDetalleFields);
        return $comprobanteDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of ComprobanteDetalle
     *
     * @param array $comprobanteDetalleFields
     * @return ComprobanteDetalle
     */
    public function fakeComprobanteDetalle($comprobanteDetalleFields = [])
    {
        return new ComprobanteDetalle($this->fakeComprobanteDetalleData($comprobanteDetalleFields));
    }

    /**
     * Get fake data of ComprobanteDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeComprobanteDetalleData($comprobanteDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cantidad' => $fake->randomDigitNotNull,
            'mtoPrecio' => $fake->word,
            'idPresentacionProducto' => $fake->randomDigitNotNull,
            'idComprobante' => $fake->randomDigitNotNull
        ], $comprobanteDetalleFields);
    }
}
