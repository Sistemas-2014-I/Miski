<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoComprobanteAPIRequest;
use App\Http\Requests\API\UpdateTipoComprobanteAPIRequest;
use App\Models\TipoComprobante;
use App\Repositories\TipoComprobanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TipoComprobanteController
 * @package App\Http\Controllers\API
 */

class TipoComprobanteAPIController extends AppBaseController
{
    /** @var  TipoComprobanteRepository */
    private $tipoComprobanteRepository;

    public function __construct(TipoComprobanteRepository $tipoComprobanteRepo)
    {
        $this->tipoComprobanteRepository = $tipoComprobanteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tipoComprobantes",
     *      summary="Get a listing of the TipoComprobantes.",
     *      tags={"TipoComprobante"},
     *      description="Get all TipoComprobantes",
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
     *                  @SWG\Items(ref="#/definitions/TipoComprobante")
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
        $this->tipoComprobanteRepository->pushCriteria(new RequestCriteria($request));
        $this->tipoComprobanteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tipoComprobantes = $this->tipoComprobanteRepository->all();

        return $this->sendResponse($tipoComprobantes->toArray(), 'Tipo Comprobantes retrieved successfully');
    }

    /**
     * @param CreateTipoComprobanteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tipoComprobantes",
     *      summary="Store a newly created TipoComprobante in storage",
     *      tags={"TipoComprobante"},
     *      description="Store TipoComprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TipoComprobante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TipoComprobante")
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
     *                  ref="#/definitions/TipoComprobante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTipoComprobanteAPIRequest $request)
    {
        $input = $request->all();

        $tipoComprobantes = $this->tipoComprobanteRepository->create($input);

        return $this->sendResponse($tipoComprobantes->toArray(), 'Tipo Comprobante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tipoComprobantes/{id}",
     *      summary="Display the specified TipoComprobante",
     *      tags={"TipoComprobante"},
     *      description="Get TipoComprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoComprobante",
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
     *                  ref="#/definitions/TipoComprobante"
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
        /** @var TipoComprobante $tipoComprobante */
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            return $this->sendError('Tipo Comprobante not found');
        }

        return $this->sendResponse($tipoComprobante->toArray(), 'Tipo Comprobante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTipoComprobanteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tipoComprobantes/{id}",
     *      summary="Update the specified TipoComprobante in storage",
     *      tags={"TipoComprobante"},
     *      description="Update TipoComprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoComprobante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TipoComprobante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TipoComprobante")
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
     *                  ref="#/definitions/TipoComprobante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTipoComprobanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoComprobante $tipoComprobante */
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            return $this->sendError('Tipo Comprobante not found');
        }

        $tipoComprobante = $this->tipoComprobanteRepository->update($input, $id);

        return $this->sendResponse($tipoComprobante->toArray(), 'TipoComprobante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tipoComprobantes/{id}",
     *      summary="Remove the specified TipoComprobante from storage",
     *      tags={"TipoComprobante"},
     *      description="Delete TipoComprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoComprobante",
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
        /** @var TipoComprobante $tipoComprobante */
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            return $this->sendError('Tipo Comprobante not found');
        }

        $tipoComprobante->delete();

        return $this->sendResponse($id, 'Tipo Comprobante deleted successfully');
    }
}
