<?php

use Faker\Factory as Faker;
use App\Models\FormaPagoDetalle;
use App\Repositories\FormaPagoDetalleRepository;

trait MakeFormaPagoDetalleTrait
{
    /**
     * Create fake instance of FormaPagoDetalle and save it in database
     *
     * @param array $formaPagoDetalleFields
     * @return FormaPagoDetalle
     */
    public function makeFormaPagoDetalle($formaPagoDetalleFields = [])
    {
        /** @var FormaPagoDetalleRepository $formaPagoDetalleRepo */
        $formaPagoDetalleRepo = App::make(FormaPagoDetalleRepository::class);
        $theme = $this->fakeFormaPagoDetalleData($formaPagoDetalleFields);
        return $formaPagoDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of FormaPagoDetalle
     *
     * @param array $formaPagoDetalleFields
     * @return FormaPagoDetalle
     */
    public function fakeFormaPagoDetalle($formaPagoDetalleFields = [])
    {
        return new FormaPagoDetalle($this->fakeFormaPagoDetalleData($formaPagoDetalleFields));
    }

    /**
     * Get fake data of FormaPagoDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFormaPagoDetalleData($formaPagoDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'mtoRecibido' => $fake->word,
            'mtoCobrado' => $fake->word,
            'mtoVuelto' => $fake->word,
            'idFormaPago' => $fake->randomDigitNotNull,
            'idComprobante' => $fake->randomDigitNotNull
        ], $formaPagoDetalleFields);
    }
}
