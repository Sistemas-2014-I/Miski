<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePedidoAPIRequest;
use App\Http\Requests\API\UpdatePedidoAPIRequest;
use App\Models\Pedido;
use App\Repositories\PedidoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PedidoController
 * @package App\Http\Controllers\API
 */

class PedidoAPIController extends AppBaseController
{
    /** @var  PedidoRepository */
    private $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pedidos",
     *      summary="Get a listing of the Pedidos.",
     *      tags={"Pedido"},
     *      description="Get all Pedidos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Pedido")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->pedidoRepository->pushCriteria(new RequestCriteria($request));
        $this->pedidoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pedidos = $this->pedidoRepository->all();

        return $this->sendResponse($pedidos->toArray(), 'Pedidos retrieved successfully');
    }

    /**
     * @param CreatePedidoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pedidos",
     *      summary="Store a newly created Pedido in storage",
     *      tags={"Pedido"},
     *      description="Store Pedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pedido that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pedido")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pedido"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePedidoAPIRequest $request)
    {
        $input = $request->all();

        $pedidos = $this->pedidoRepository->create($input);

        return $this->sendResponse($pedidos->toArray(), 'Pedido saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pedidos/{id}",
     *      summary="Display the specified Pedido",
     *      tags={"Pedido"},
     *      description="Get Pedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pedido",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pedido"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Pedido $pedido */
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            return $this->sendError('Pedido not found');
        }

        return $this->sendResponse($pedido->toArray(), 'Pedido retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePedidoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pedidos/{id}",
     *      summary="Update the specified Pedido in storage",
     *      tags={"Pedido"},
     *      description="Update Pedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pedido",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pedido that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pedido")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pedido"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePedidoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pedido $pedido */
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            return $this->sendError('Pedido not found');
        }

        $pedido = $this->pedidoRepository->update($input, $id);

        return $this->sendResponse($pedido->toArray(), 'Pedido updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pedidos/{id}",
     *      summary="Remove the specified Pedido from storage",
     *      tags={"Pedido"},
     *      description="Delete Pedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pedido",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Pedido $pedido */
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            return $this->sendError('Pedido not found');
        }

        $pedido->delete();

        return $this->sendResponse($id, 'Pedido deleted successfully');
    }
}
