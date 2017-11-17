<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComprobanteDetalleAPIRequest;
use App\Http\Requests\API\UpdateComprobanteDetalleAPIRequest;
use App\Models\ComprobanteDetalle;
use App\Repositories\ComprobanteDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ComprobanteDetalleController
 * @package App\Http\Controllers\API
 */

class ComprobanteDetalleAPIController extends AppBaseController
{
    /** @var  ComprobanteDetalleRepository */
    private $comprobanteDetalleRepository;

    public function __construct(ComprobanteDetalleRepository $comprobanteDetalleRepo)
    {
        $this->comprobanteDetalleRepository = $comprobanteDetalleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/comprobanteDetalles",
     *      summary="Get a listing of the ComprobanteDetalles.",
     *      tags={"ComprobanteDetalle"},
     *      description="Get all ComprobanteDetalles",
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
     *                  @SWG\Items(ref="#/definitions/ComprobanteDetalle")
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
        $this->comprobanteDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->comprobanteDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comprobanteDetalles = $this->comprobanteDetalleRepository->all();

        return $this->sendResponse($comprobanteDetalles->toArray(), 'Comprobante Detalles retrieved successfully');
    }

    /**
     * @param CreateComprobanteDetalleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/comprobanteDetalles",
     *      summary="Store a newly created ComprobanteDetalle in storage",
     *      tags={"ComprobanteDetalle"},
     *      description="Store ComprobanteDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ComprobanteDetalle that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ComprobanteDetalle")
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
     *                  ref="#/definitions/ComprobanteDetalle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateComprobanteDetalleAPIRequest $request)
    {
        $input = $request->all();

        $comprobanteDetalles = $this->comprobanteDetalleRepository->create($input);

        return $this->sendResponse($comprobanteDetalles->toArray(), 'Comprobante Detalle saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/comprobanteDetalles/{id}",
     *      summary="Display the specified ComprobanteDetalle",
     *      tags={"ComprobanteDetalle"},
     *      description="Get ComprobanteDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ComprobanteDetalle",
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
     *                  ref="#/definitions/ComprobanteDetalle"
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
        /** @var ComprobanteDetalle $comprobanteDetalle */
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            return $this->sendError('Comprobante Detalle not found');
        }

        return $this->sendResponse($comprobanteDetalle->toArray(), 'Comprobante Detalle retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateComprobanteDetalleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/comprobanteDetalles/{id}",
     *      summary="Update the specified ComprobanteDetalle in storage",
     *      tags={"ComprobanteDetalle"},
     *      description="Update ComprobanteDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ComprobanteDetalle",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ComprobanteDetalle that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ComprobanteDetalle")
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
     *                  ref="#/definitions/ComprobanteDetalle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateComprobanteDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var ComprobanteDetalle $comprobanteDetalle */
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            return $this->sendError('Comprobante Detalle not found');
        }

        $comprobanteDetalle = $this->comprobanteDetalleRepository->update($input, $id);

        return $this->sendResponse($comprobanteDetalle->toArray(), 'ComprobanteDetalle updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/comprobanteDetalles/{id}",
     *      summary="Remove the specified ComprobanteDetalle from storage",
     *      tags={"ComprobanteDetalle"},
     *      description="Delete ComprobanteDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ComprobanteDetalle",
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
        /** @var ComprobanteDetalle $comprobanteDetalle */
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            return $this->sendError('Comprobante Detalle not found');
        }

        $comprobanteDetalle->delete();

        return $this->sendResponse($id, 'Comprobante Detalle deleted successfully');
    }
}
