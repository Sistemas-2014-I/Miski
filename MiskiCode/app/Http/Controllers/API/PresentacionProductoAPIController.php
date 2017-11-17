<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePresentacionProductoAPIRequest;
use App\Http\Requests\API\UpdatePresentacionProductoAPIRequest;
use App\Models\PresentacionProducto;
use App\Repositories\PresentacionProductoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PresentacionProductoController
 * @package App\Http\Controllers\API
 */

class PresentacionProductoAPIController extends AppBaseController
{
    /** @var  PresentacionProductoRepository */
    private $presentacionProductoRepository;

    public function __construct(PresentacionProductoRepository $presentacionProductoRepo)
    {
        $this->presentacionProductoRepository = $presentacionProductoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/presentacionProductos",
     *      summary="Get a listing of the PresentacionProductos.",
     *      tags={"PresentacionProducto"},
     *      description="Get all PresentacionProductos",
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
     *                  @SWG\Items(ref="#/definitions/PresentacionProducto")
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
        $this->presentacionProductoRepository->pushCriteria(new RequestCriteria($request));
        $this->presentacionProductoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $presentacionProductos = $this->presentacionProductoRepository->all();

        return $this->sendResponse($presentacionProductos->toArray(), 'Presentacion Productos retrieved successfully');
    }

    /**
     * @param CreatePresentacionProductoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/presentacionProductos",
     *      summary="Store a newly created PresentacionProducto in storage",
     *      tags={"PresentacionProducto"},
     *      description="Store PresentacionProducto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PresentacionProducto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PresentacionProducto")
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
     *                  ref="#/definitions/PresentacionProducto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePresentacionProductoAPIRequest $request)
    {
        $input = $request->all();

        $presentacionProductos = $this->presentacionProductoRepository->create($input);

        return $this->sendResponse($presentacionProductos->toArray(), 'Presentacion Producto saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/presentacionProductos/{id}",
     *      summary="Display the specified PresentacionProducto",
     *      tags={"PresentacionProducto"},
     *      description="Get PresentacionProducto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PresentacionProducto",
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
     *                  ref="#/definitions/PresentacionProducto"
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
        /** @var PresentacionProducto $presentacionProducto */
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            return $this->sendError('Presentacion Producto not found');
        }

        return $this->sendResponse($presentacionProducto->toArray(), 'Presentacion Producto retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePresentacionProductoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/presentacionProductos/{id}",
     *      summary="Update the specified PresentacionProducto in storage",
     *      tags={"PresentacionProducto"},
     *      description="Update PresentacionProducto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PresentacionProducto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PresentacionProducto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PresentacionProducto")
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
     *                  ref="#/definitions/PresentacionProducto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePresentacionProductoAPIRequest $request)
    {
        $input = $request->all();

        /** @var PresentacionProducto $presentacionProducto */
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            return $this->sendError('Presentacion Producto not found');
        }

        $presentacionProducto = $this->presentacionProductoRepository->update($input, $id);

        return $this->sendResponse($presentacionProducto->toArray(), 'PresentacionProducto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/presentacionProductos/{id}",
     *      summary="Remove the specified PresentacionProducto from storage",
     *      tags={"PresentacionProducto"},
     *      description="Delete PresentacionProducto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PresentacionProducto",
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
        /** @var PresentacionProducto $presentacionProducto */
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            return $this->sendError('Presentacion Producto not found');
        }

        $presentacionProducto->delete();

        return $this->sendResponse($id, 'Presentacion Producto deleted successfully');
    }
}
