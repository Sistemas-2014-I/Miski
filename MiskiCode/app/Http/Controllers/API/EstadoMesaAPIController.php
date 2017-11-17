<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstadoMesaAPIRequest;
use App\Http\Requests\API\UpdateEstadoMesaAPIRequest;
use App\Models\EstadoMesa;
use App\Repositories\EstadoMesaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EstadoMesaController
 * @package App\Http\Controllers\API
 */

class EstadoMesaAPIController extends AppBaseController
{
    /** @var  EstadoMesaRepository */
    private $estadoMesaRepository;

    public function __construct(EstadoMesaRepository $estadoMesaRepo)
    {
        $this->estadoMesaRepository = $estadoMesaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/estadoMesas",
     *      summary="Get a listing of the EstadoMesas.",
     *      tags={"EstadoMesa"},
     *      description="Get all EstadoMesas",
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
     *                  @SWG\Items(ref="#/definitions/EstadoMesa")
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
        $this->estadoMesaRepository->pushCriteria(new RequestCriteria($request));
        $this->estadoMesaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estadoMesas = $this->estadoMesaRepository->all();

        return $this->sendResponse($estadoMesas->toArray(), 'Estado Mesas retrieved successfully');
    }

    /**
     * @param CreateEstadoMesaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/estadoMesas",
     *      summary="Store a newly created EstadoMesa in storage",
     *      tags={"EstadoMesa"},
     *      description="Store EstadoMesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EstadoMesa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EstadoMesa")
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
     *                  ref="#/definitions/EstadoMesa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEstadoMesaAPIRequest $request)
    {
        $input = $request->all();

        $estadoMesas = $this->estadoMesaRepository->create($input);

        return $this->sendResponse($estadoMesas->toArray(), 'Estado Mesa saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/estadoMesas/{id}",
     *      summary="Display the specified EstadoMesa",
     *      tags={"EstadoMesa"},
     *      description="Get EstadoMesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EstadoMesa",
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
     *                  ref="#/definitions/EstadoMesa"
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
        /** @var EstadoMesa $estadoMesa */
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            return $this->sendError('Estado Mesa not found');
        }

        return $this->sendResponse($estadoMesa->toArray(), 'Estado Mesa retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEstadoMesaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/estadoMesas/{id}",
     *      summary="Update the specified EstadoMesa in storage",
     *      tags={"EstadoMesa"},
     *      description="Update EstadoMesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EstadoMesa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EstadoMesa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EstadoMesa")
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
     *                  ref="#/definitions/EstadoMesa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEstadoMesaAPIRequest $request)
    {
        $input = $request->all();

        /** @var EstadoMesa $estadoMesa */
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            return $this->sendError('Estado Mesa not found');
        }

        $estadoMesa = $this->estadoMesaRepository->update($input, $id);

        return $this->sendResponse($estadoMesa->toArray(), 'EstadoMesa updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/estadoMesas/{id}",
     *      summary="Remove the specified EstadoMesa from storage",
     *      tags={"EstadoMesa"},
     *      description="Delete EstadoMesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EstadoMesa",
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
        /** @var EstadoMesa $estadoMesa */
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            return $this->sendError('Estado Mesa not found');
        }

        $estadoMesa->delete();

        return $this->sendResponse($id, 'Estado Mesa deleted successfully');
    }
}
