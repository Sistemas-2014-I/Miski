<?php

use Faker\Factory as Faker;
use App\Models\EstadoPedido;
use App\Repositories\EstadoPedidoRepository;

trait MakeEstadoPedidoTrait
{
    /**
     * Create fake instance of EstadoPedido and save it in database
     *
     * @param array $estadoPedidoFields
     * @return EstadoPedido
     */
    public function makeEstadoPedido($estadoPedidoFields = [])
    {
        /** @var EstadoPedidoRepository $estadoPedidoRepo */
        $estadoPedidoRepo = App::make(EstadoPedidoRepository::class);
        $theme = $this->fakeEstadoPedidoData($estadoPedidoFields);
        return $estadoPedidoRepo->create($theme);
    }

    /**
     * Get fake instance of EstadoPedido
     *
     * @param array $estadoPedidoFields
     * @return EstadoPedido
     */
    public function fakeEstadoPedido($estadoPedidoFields = [])
    {
        return new EstadoPedido($this->fakeEstadoPedidoData($estadoPedidoFields));
    }

    /**
     * Get fake data of EstadoPedido
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEstadoPedidoData($estadoPedidoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'abrv' => $fake->word,
            'nombre' => $fake->word,
            'colorHexadecimal' => $fake->word
        ], $estadoPedidoFields);
    }
}
