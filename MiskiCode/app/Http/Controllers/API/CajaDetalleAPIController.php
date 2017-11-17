<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCajaDetalleAPIRequest;
use App\Http\Requests\API\UpdateCajaDetalleAPIRequest;
use App\Models\CajaDetalle;
use App\Repositories\CajaDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CajaDetalleController
 * @package App\Http\Controllers\API
 */

class CajaDetalleAPIController extends AppBaseController
{
    /** @var  CajaDetalleRepository */
    private $cajaDetalleRepository;

    public function __construct(CajaDetalleRepository $cajaDetalleRepo)
    {
        $this->cajaDetalleRepository = $cajaDetalleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cajaDetalles",
     *      summary="Get a listing of the CajaDetalles.",
     *      tags={"CajaDetalle"},
     *      description="Get all CajaDetalles",
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
     *                  @SWG\Items(ref="#/definitions/CajaDetalle")
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
        $this->cajaDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->cajaDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cajaDetalles = $this->cajaDetalleRepository->all();

        return $this->sendResponse($cajaDetalles->toArray(), 'Caja Detalles retrieved successfully');
    }

    /**
     * @param CreateCajaDetalleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cajaDetalles",
     *      summary="Store a newly created CajaDetalle in storage",
     *      tags={"CajaDetalle"},
     *      description="Store CajaDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CajaDetalle that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CajaDetalle")
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
     *                  ref="#/definitions/CajaDetalle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCajaDetalleAPIRequest $request)
    {
        $input = $request->all();

        $cajaDetalles = $this->cajaDetalleRepository->create($input);

        return $this->sendResponse($cajaDetalles->toArray(), 'Caja Detalle saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cajaDetalles/{id}",
     *      summary="Display the specified CajaDetalle",
     *      tags={"CajaDetalle"},
     *      description="Get CajaDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CajaDetalle",
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
     *                  ref="#/definitions/CajaDetalle"
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
        /** @var CajaDetalle $cajaDetalle */
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            return $this->sendError('Caja Detalle not found');
        }

        return $this->sendResponse($cajaDetalle->toArray(), 'Caja Detalle retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCajaDetalleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cajaDetalles/{id}",
     *      summary="Update the specified CajaDetalle in storage",
     *      tags={"CajaDetalle"},
     *      description="Update CajaDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CajaDetalle",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CajaDetalle that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CajaDetalle")
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
     *                  ref="#/definitions/CajaDetalle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCajaDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var CajaDetalle $cajaDetalle */
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            return $this->sendError('Caja Detalle not found');
        }

        $cajaDetalle = $this->cajaDetalleRepository->update($input, $id);

        return $this->sendResponse($cajaDetalle->toArray(), 'CajaDetalle updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cajaDetalles/{id}",
     *      summary="Remove the specified CajaDetalle from storage",
     *      tags={"CajaDetalle"},
     *      description="Delete CajaDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CajaDetalle",
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
        /** @var CajaDetalle $cajaDetalle */
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            return $this->sendError('Caja Detalle not found');
        }

        $cajaDetalle->delete();

        return $this->sendResponse($id, 'Caja Detalle deleted successfully');
    }
}
