<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoEmpleadoAPIRequest;
use App\Http\Requests\API\UpdateTipoEmpleadoAPIRequest;
use App\Models\TipoEmpleado;
use App\Repositories\TipoEmpleadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TipoEmpleadoController
 * @package App\Http\Controllers\API
 */

class TipoEmpleadoAPIController extends AppBaseController
{
    /** @var  TipoEmpleadoRepository */
    private $tipoEmpleadoRepository;

    public function __construct(TipoEmpleadoRepository $tipoEmpleadoRepo)
    {
        $this->tipoEmpleadoRepository = $tipoEmpleadoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tipoEmpleados",
     *      summary="Get a listing of the TipoEmpleados.",
     *      tags={"TipoEmpleado"},
     *      description="Get all TipoEmpleados",
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
     *                  @SWG\Items(ref="#/definitions/TipoEmpleado")
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
        $this->tipoEmpleadoRepository->pushCriteria(new RequestCriteria($request));
        $this->tipoEmpleadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tipoEmpleados = $this->tipoEmpleadoRepository->all();

        return $this->sendResponse($tipoEmpleados->toArray(), 'Tipo Empleados retrieved successfully');
    }

    /**
     * @param CreateTipoEmpleadoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tipoEmpleados",
     *      summary="Store a newly created TipoEmpleado in storage",
     *      tags={"TipoEmpleado"},
     *      description="Store TipoEmpleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TipoEmpleado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TipoEmpleado")
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
     *                  ref="#/definitions/TipoEmpleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTipoEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        $tipoEmpleados = $this->tipoEmpleadoRepository->create($input);

        return $this->sendResponse($tipoEmpleados->toArray(), 'Tipo Empleado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tipoEmpleados/{id}",
     *      summary="Display the specified TipoEmpleado",
     *      tags={"TipoEmpleado"},
     *      description="Get TipoEmpleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoEmpleado",
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
     *                  ref="#/definitions/TipoEmpleado"
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
        /** @var TipoEmpleado $tipoEmpleado */
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            return $this->sendError('Tipo Empleado not found');
        }

        return $this->sendResponse($tipoEmpleado->toArray(), 'Tipo Empleado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTipoEmpleadoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tipoEmpleados/{id}",
     *      summary="Update the specified TipoEmpleado in storage",
     *      tags={"TipoEmpleado"},
     *      description="Update TipoEmpleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoEmpleado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TipoEmpleado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TipoEmpleado")
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
     *                  ref="#/definitions/TipoEmpleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTipoEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoEmpleado $tipoEmpleado */
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            return $this->sendError('Tipo Empleado not found');
        }

        $tipoEmpleado = $this->tipoEmpleadoRepository->update($input, $id);

        return $this->sendResponse($tipoEmpleado->toArray(), 'TipoEmpleado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tipoEmpleados/{id}",
     *      summary="Remove the specified TipoEmpleado from storage",
     *      tags={"TipoEmpleado"},
     *      description="Delete TipoEmpleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoEmpleado",
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
        /** @var TipoEmpleado $tipoEmpleado */
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            return $this->sendError('Tipo Empleado not found');
        }

        $tipoEmpleado->delete();

        return $this->sendResponse($id, 'Tipo Empleado deleted successfully');
    }
}
