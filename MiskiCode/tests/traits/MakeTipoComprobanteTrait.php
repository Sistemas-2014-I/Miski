<?php

use Faker\Factory as Faker;
use App\Models\TipoComprobante;
use App\Repositories\TipoComprobanteRepository;

trait MakeTipoComprobanteTrait
{
    /**
     * Create fake instance of TipoComprobante and save it in database
     *
     * @param array $tipoComprobanteFields
     * @return TipoComprobante
     */
    public function makeTipoComprobante($tipoComprobanteFields = [])
    {
        /** @var TipoComprobanteRepository $tipoComprobanteRepo */
        $tipoComprobanteRepo = App::make(TipoComprobanteRepository::class);
        $theme = $this->fakeTipoComprobanteData($tipoComprobanteFields);
        return $tipoComprobanteRepo->create($theme);
    }

    /**
     * Get fake instance of TipoComprobante
     *
     * @param array $tipoComprobanteFields
     * @return TipoComprobante
     */
    public function fakeTipoComprobante($tipoComprobanteFields = [])
    {
        return new TipoComprobante($this->fakeTipoComprobanteData($tipoComprobanteFields));
    }

    /**
     * Get fake data of TipoComprobante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipoComprobanteData($tipoComprobanteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod' => $fake->word,
            'abrv' => $fake->word,
            'nombre' => $fake->word,
            'activo' => $fake->word
        ], $tipoComprobanteFields);
    }
}
