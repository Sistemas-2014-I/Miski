<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFormaPagoDetalleAPIRequest;
use App\Http\Requests\API\UpdateFormaPagoDetalleAPIRequest;
use App\Models\FormaPagoDetalle;
use App\Repositories\FormaPagoDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FormaPagoDetalleController
 * @package App\Http\Controllers\API
 */

class FormaPagoDetalleAPIController extends AppBaseController
{
    /** @var  FormaPagoDetalleRepository */
    private $formaPagoDetalleRepository;

    public function __construct(FormaPagoDetalleRepository $formaPagoDetalleRepo)
    {
        $this->formaPagoDetalleRepository = $formaPagoDetalleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/formaPagoDetalles",
     *      summary="Get a listing of the FormaPagoDetalles.",
     *      tags={"FormaPagoDetalle"},
     *      description="Get all FormaPagoDetalles",
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
     *                  @SWG\Items(ref="#/definitions/FormaPagoDetalle")
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
        $this->formaPagoDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->formaPagoDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $formaPagoDetalles = $this->formaPagoDetalleRepository->all();

        return $this->sendResponse($formaPagoDetalles->toArray(), 'Forma Pago Detalles retrieved successfully');
    }

    /**
     * @param CreateFormaPagoDetalleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/formaPagoDetalles",
     *      summary="Store a newly created FormaPagoDetalle in storage",
     *      tags={"FormaPagoDetalle"},
     *      description="Store FormaPagoDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FormaPagoDetalle that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FormaPagoDetalle")
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
     *                  ref="#/definitions/FormaPagoDetalle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFormaPagoDetalleAPIRequest $request)
    {
        $input = $request->all();

        $formaPagoDetalles = $this->formaPagoDetalleRepository->create($input);

        return $this->sendResponse($formaPagoDetalles->toArray(), 'Forma Pago Detalle saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/formaPagoDetalles/{id}",
     *      summary="Display the specified FormaPagoDetalle",
     *      tags={"FormaPagoDetalle"},
     *      description="Get FormaPagoDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FormaPagoDetalle",
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
     *                  ref="#/definitions/FormaPagoDetalle"
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
        /** @var FormaPagoDetalle $formaPagoDetalle */
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            return $this->sendError('Forma Pago Detalle not found');
        }

        return $this->sendResponse($formaPagoDetalle->toArray(), 'Forma Pago Detalle retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFormaPagoDetalleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/formaPagoDetalles/{id}",
     *      summary="Update the specified FormaPagoDetalle in storage",
     *      tags={"FormaPagoDetalle"},
     *      description="Update FormaPagoDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FormaPagoDetalle",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FormaPagoDetalle that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FormaPagoDetalle")
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
     *                  ref="#/definitions/FormaPagoDetalle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFormaPagoDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var FormaPagoDetalle $formaPagoDetalle */
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            return $this->sendError('Forma Pago Detalle not found');
        }

        $formaPagoDetalle = $this->formaPagoDetalleRepository->update($input, $id);

        return $this->sendResponse($formaPagoDetalle->toArray(), 'FormaPagoDetalle updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/formaPagoDetalles/{id}",
     *      summary="Remove the specified FormaPagoDetalle from storage",
     *      tags={"FormaPagoDetalle"},
     *      description="Delete FormaPagoDetalle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FormaPagoDetalle",
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
        /** @var FormaPagoDetalle $formaPagoDetalle */
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            return $this->sendError('Forma Pago Detalle not found');
        }

        $formaPagoDetalle->delete();

        return $this->sendResponse($id, 'Forma Pago Detalle deleted successfully');
    }
}
