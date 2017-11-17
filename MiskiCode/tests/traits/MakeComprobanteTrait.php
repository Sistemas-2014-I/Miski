<?php

use Faker\Factory as Faker;
use App\Models\Comprobante;
use App\Repositories\ComprobanteRepository;

trait MakeComprobanteTrait
{
    /**
     * Create fake instance of Comprobante and save it in database
     *
     * @param array $comprobanteFields
     * @return Comprobante
     */
    public function makeComprobante($comprobanteFields = [])
    {
        /** @var ComprobanteRepository $comprobanteRepo */
        $comprobanteRepo = App::make(ComprobanteRepository::class);
        $theme = $this->fakeComprobanteData($comprobanteFields);
        return $comprobanteRepo->create($theme);
    }

    /**
     * Get fake instance of Comprobante
     *
     * @param array $comprobanteFields
     * @return Comprobante
     */
    public function fakeComprobante($comprobanteFields = [])
    {
        return new Comprobante($this->fakeComprobanteData($comprobanteFields));
    }

    /**
     * Get fake data of Comprobante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeComprobanteData($comprobanteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecHorRegistro' => $fake->date('Y-m-d H:i:s'),
            'serie' => $fake->word,
            'numCorrelativo' => $fake->word,
            'obsv' => $fake->word,
            'mtoBaseImponible' => $fake->word,
            'mtoIgv' => $fake->word,
            'mtoDescuento' => $fake->word,
            'mtoTotal' => $fake->word,
            'mtoVuelto' => $fake->word,
            'cortesia' => $fake->word,
            'anulado' => $fake->word,
            'idCliente' => $fake->randomDigitNotNull,
            'idPedido' => $fake->randomDigitNotNull,
            'idTipoComprobante' => $fake->randomDigitNotNull,
            'idSucursal' => $fake->randomDigitNotNull,
            'idMoneda' => $fake->randomDigitNotNull,
            'idWorkstation' => $fake->randomDigitNotNull
        ], $comprobanteFields);
    }
}
