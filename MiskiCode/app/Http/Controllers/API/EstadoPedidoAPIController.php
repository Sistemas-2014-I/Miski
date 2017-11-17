<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstadoPedidoAPIRequest;
use App\Http\Requests\API\UpdateEstadoPedidoAPIRequest;
use App\Models\EstadoPedido;
use App\Repositories\EstadoPedidoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EstadoPedidoController
 * @package App\Http\Controllers\API
 */

class EstadoPedidoAPIController extends AppBaseController
{
    /** @var  EstadoPedidoRepository */
    private $estadoPedidoRepository;

    public function __construct(EstadoPedidoRepository $estadoPedidoRepo)
    {
        $this->estadoPedidoRepository = $estadoPedidoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/estadoPedidos",
     *      summary="Get a listing of the EstadoPedidos.",
     *      tags={"EstadoPedido"},
     *      description="Get all EstadoPedidos",
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
     *                  @SWG\Items(ref="#/definitions/EstadoPedido")
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
        $this->estadoPedidoRepository->pushCriteria(new RequestCriteria($request));
        $this->estadoPedidoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estadoPedidos = $this->estadoPedidoRepository->all();

        return $this->sendResponse($estadoPedidos->toArray(), 'Estado Pedidos retrieved successfully');
    }

    /**
     * @param CreateEstadoPedidoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/estadoPedidos",
     *      summary="Store a newly created EstadoPedido in storage",
     *      tags={"EstadoPedido"},
     *      description="Store EstadoPedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EstadoPedido that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EstadoPedido")
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
     *                  ref="#/definitions/EstadoPedido"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEstadoPedidoAPIRequest $request)
    {
        $input = $request->all();

        $estadoPedidos = $this->estadoPedidoRepository->create($input);

        return $this->sendResponse($estadoPedidos->toArray(), 'Estado Pedido saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/estadoPedidos/{id}",
     *      summary="Display the specified EstadoPedido",
     *      tags={"EstadoPedido"},
     *      description="Get EstadoPedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EstadoPedido",
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
     *                  ref="#/definitions/EstadoPedido"
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
        /** @var EstadoPedido $estadoPedido */
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            return $this->sendError('Estado Pedido not found');
        }

        return $this->sendResponse($estadoPedido->toArray(), 'Estado Pedido retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEstadoPedidoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/estadoPedidos/{id}",
     *      summary="Update the specified EstadoPedido in storage",
     *      tags={"EstadoPedido"},
     *      description="Update EstadoPedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EstadoPedido",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EstadoPedido that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EstadoPedido")
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
     *                  ref="#/definitions/EstadoPedido"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEstadoPedidoAPIRequest $request)
    {
        $input = $request->all();

        /** @var EstadoPedido $estadoPedido */
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            return $this->sendError('Estado Pedido not found');
        }

        $estadoPedido = $this->estadoPedidoRepository->update($input, $id);

        return $this->sendResponse($estadoPedido->toArray(), 'EstadoPedido updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/estadoPedidos/{id}",
     *      summary="Remove the specified EstadoPedido from storage",
     *      tags={"EstadoPedido"},
     *      description="Delete EstadoPedido",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EstadoPedido",
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
        /** @var EstadoPedido $estadoPedido */
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            return $this->sendError('Estado Pedido not found');
        }

        $estadoPedido->delete();

        return $this->sendResponse($id, 'Estado Pedido deleted successfully');
    }
}
