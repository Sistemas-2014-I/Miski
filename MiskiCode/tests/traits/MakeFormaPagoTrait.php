<?php

use Faker\Factory as Faker;
use App\Models\FormaPago;
use App\Repositories\FormaPagoRepository;

trait MakeFormaPagoTrait
{
    /**
     * Create fake instance of FormaPago and save it in database
     *
     * @param array $formaPagoFields
     * @return FormaPago
     */
    public function makeFormaPago($formaPagoFields = [])
    {
        /** @var FormaPagoRepository $formaPagoRepo */
        $formaPagoRepo = App::make(FormaPagoRepository::class);
        $theme = $this->fakeFormaPagoData($formaPagoFields);
        return $formaPagoRepo->create($theme);
    }

    /**
     * Get fake instance of FormaPago
     *
     * @param array $formaPagoFields
     * @return FormaPago
     */
    public function fakeFormaPago($formaPagoFields = [])
    {
        return new FormaPago($this->fakeFormaPagoData($formaPagoFields));
    }

    /**
     * Get fake data of FormaPago
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFormaPagoData($formaPagoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'abrv' => $fake->word,
            'nombre' => $fake->word,
            'activo' => $fake->word
        ], $formaPagoFields);
    }
}
