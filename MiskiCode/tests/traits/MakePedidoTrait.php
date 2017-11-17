<?php

use Faker\Factory as Faker;
use App\Models\Pedido;
use App\Repositories\PedidoRepository;

trait MakePedidoTrait
{
    /**
     * Create fake instance of Pedido and save it in database
     *
     * @param array $pedidoFields
     * @return Pedido
     */
    public function makePedido($pedidoFields = [])
    {
        /** @var PedidoRepository $pedidoRepo */
        $pedidoRepo = App::make(PedidoRepository::class);
        $theme = $this->fakePedidoData($pedidoFields);
        return $pedidoRepo->create($theme);
    }

    /**
     * Get fake instance of Pedido
     *
     * @param array $pedidoFields
     * @return Pedido
     */
    public function fakePedido($pedidoFields = [])
    {
        return new Pedido($this->fakePedidoData($pedidoFields));
    }

    /**
     * Get fake data of Pedido
     *
     * @param array $postFields
     * @return array
     */
    public function fakePedidoData($pedidoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cantidad' => $fake->randomDigitNotNull,
            'mtoPrecio' => $fake->word,
            'activo' => $fake->word,
            'idPedido' => $fake->randomDigitNotNull,
            'idPresentacionProducto' => $fake->randomDigitNotNull
        ], $pedidoFields);
    }
}
