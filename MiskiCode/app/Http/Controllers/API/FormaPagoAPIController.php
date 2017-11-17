<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFormaPagoAPIRequest;
use App\Http\Requests\API\UpdateFormaPagoAPIRequest;
use App\Models\FormaPago;
use App\Repositories\FormaPagoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FormaPagoController
 * @package App\Http\Controllers\API
 */

class FormaPagoAPIController extends AppBaseController
{
    /** @var  FormaPagoRepository */
    private $formaPagoRepository;

    public function __construct(FormaPagoRepository $formaPagoRepo)
    {
        $this->formaPagoRepository = $formaPagoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/formaPagos",
     *      summary="Get a listing of the FormaPagos.",
     *      tags={"FormaPago"},
     *      description="Get all FormaPagos",
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
     *                  @SWG\Items(ref="#/definitions/FormaPago")
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
        $this->formaPagoRepository->pushCriteria(new RequestCriteria($request));
        $this->formaPagoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $formaPagos = $this->formaPagoRepository->all();

        return $this->sendResponse($formaPagos->toArray(), 'Forma Pagos retrieved successfully');
    }

    /**
     * @param CreateFormaPagoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/formaPagos",
     *      summary="Store a newly created FormaPago in storage",
     *      tags={"FormaPago"},
     *      description="Store FormaPago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FormaPago that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FormaPago")
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
     *                  ref="#/definitions/FormaPago"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFormaPagoAPIRequest $request)
    {
        $input = $request->all();

        $formaPagos = $this->formaPagoRepository->create($input);

        return $this->sendResponse($formaPagos->toArray(), 'Forma Pago saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/formaPagos/{id}",
     *      summary="Display the specified FormaPago",
     *      tags={"FormaPago"},
     *      description="Get FormaPago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FormaPago",
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
     *                  ref="#/definitions/FormaPago"
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
        /** @var FormaPago $formaPago */
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            return $this->sendError('Forma Pago not found');
        }

        return $this->sendResponse($formaPago->toArray(), 'Forma Pago retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFormaPagoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/formaPagos/{id}",
     *      summary="Update the specified FormaPago in storage",
     *      tags={"FormaPago"},
     *      description="Update FormaPago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FormaPago",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FormaPago that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FormaPago")
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
     *                  ref="#/definitions/FormaPago"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFormaPagoAPIRequest $request)
    {
        $input = $request->all();

        /** @var FormaPago $formaPago */
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            return $this->sendError('Forma Pago not found');
        }

        $formaPago = $this->formaPagoRepository->update($input, $id);

        return $this->sendResponse($formaPago->toArray(), 'FormaPago updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/formaPagos/{id}",
     *      summary="Remove the specified FormaPago from storage",
     *      tags={"FormaPago"},
     *      description="Delete FormaPago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FormaPago",
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
        /** @var FormaPago $formaPago */
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            return $this->sendError('Forma Pago not found');
        }

        $formaPago->delete();

        return $this->sendResponse($id, 'Forma Pago deleted successfully');
    }
}
