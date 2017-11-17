<?php

use Faker\Factory as Faker;
use App\Models\CajaDetalle;
use App\Repositories\CajaDetalleRepository;

trait MakeCajaDetalleTrait
{
    /**
     * Create fake instance of CajaDetalle and save it in database
     *
     * @param array $cajaDetalleFields
     * @return CajaDetalle
     */
    public function makeCajaDetalle($cajaDetalleFields = [])
    {
        /** @var CajaDetalleRepository $cajaDetalleRepo */
        $cajaDetalleRepo = App::make(CajaDetalleRepository::class);
        $theme = $this->fakeCajaDetalleData($cajaDetalleFields);
        return $cajaDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of CajaDetalle
     *
     * @param array $cajaDetalleFields
     * @return CajaDetalle
     */
    public function fakeCajaDetalle($cajaDetalleFields = [])
    {
        return new CajaDetalle($this->fakeCajaDetalleData($cajaDetalleFields));
    }

    /**
     * Get fake data of CajaDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCajaDetalleData($cajaDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecHorApertura' => $fake->date('Y-m-d H:i:s'),
            'fecHorCierre' => $fake->date('Y-m-d H:i:s'),
            'mtoApertura' => $fake->word,
            'mtoIngreso' => $fake->word,
            'mtoEgreso' => $fake->word,
            'mtoEstimado' => $fake->word,
            'mtoReal' => $fake->word,
            'mtoDiferencia' => $fake->word,
            'aperturado' => $fake->word,
            'idMoneda' => $fake->randomDigitNotNull,
            'idEmpleado' => $fake->randomDigitNotNull,
            'idWorkstation' => $fake->randomDigitNotNull
        ], $cajaDetalleFields);
    }
}
