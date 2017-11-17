<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComprobanteAPIRequest;
use App\Http\Requests\API\UpdateComprobanteAPIRequest;
use App\Models\Comprobante;
use App\Repositories\ComprobanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ComprobanteController
 * @package App\Http\Controllers\API
 */

class ComprobanteAPIController extends AppBaseController
{
    /** @var  ComprobanteRepository */
    private $comprobanteRepository;

    public function __construct(ComprobanteRepository $comprobanteRepo)
    {
        $this->comprobanteRepository = $comprobanteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/comprobantes",
     *      summary="Get a listing of the Comprobantes.",
     *      tags={"Comprobante"},
     *      description="Get all Comprobantes",
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
     *                  @SWG\Items(ref="#/definitions/Comprobante")
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
        $this->comprobanteRepository->pushCriteria(new RequestCriteria($request));
        $this->comprobanteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comprobantes = $this->comprobanteRepository->all();

        return $this->sendResponse($comprobantes->toArray(), 'Comprobantes retrieved successfully');
    }

    /**
     * @param CreateComprobanteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/comprobantes",
     *      summary="Store a newly created Comprobante in storage",
     *      tags={"Comprobante"},
     *      description="Store Comprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Comprobante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Comprobante")
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
     *                  ref="#/definitions/Comprobante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateComprobanteAPIRequest $request)
    {
        $input = $request->all();

        $comprobantes = $this->comprobanteRepository->create($input);

        return $this->sendResponse($comprobantes->toArray(), 'Comprobante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/comprobantes/{id}",
     *      summary="Display the specified Comprobante",
     *      tags={"Comprobante"},
     *      description="Get Comprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Comprobante",
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
     *                  ref="#/definitions/Comprobante"
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
        /** @var Comprobante $comprobante */
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            return $this->sendError('Comprobante not found');
        }

        return $this->sendResponse($comprobante->toArray(), 'Comprobante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateComprobanteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/comprobantes/{id}",
     *      summary="Update the specified Comprobante in storage",
     *      tags={"Comprobante"},
     *      description="Update Comprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Comprobante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Comprobante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Comprobante")
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
     *                  ref="#/definitions/Comprobante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateComprobanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comprobante $comprobante */
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            return $this->sendError('Comprobante not found');
        }

        $comprobante = $this->comprobanteRepository->update($input, $id);

        return $this->sendResponse($comprobante->toArray(), 'Comprobante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/comprobantes/{id}",
     *      summary="Remove the specified Comprobante from storage",
     *      tags={"Comprobante"},
     *      description="Delete Comprobante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Comprobante",
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
        /** @var Comprobante $comprobante */
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            return $this->sendError('Comprobante not found');
        }

        $comprobante->delete();

        return $this->sendResponse($id, 'Comprobante deleted successfully');
    }
}
