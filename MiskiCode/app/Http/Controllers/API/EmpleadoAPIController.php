<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmpleadoAPIRequest;
use App\Http\Requests\API\UpdateEmpleadoAPIRequest;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers\API
 */

class EmpleadoAPIController extends AppBaseController
{
    /** @var  EmpleadoRepository */
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepo)
    {
        $this->empleadoRepository = $empleadoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/empleados",
     *      summary="Get a listing of the Empleados.",
     *      tags={"Empleado"},
     *      description="Get all Empleados",
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
     *                  @SWG\Items(ref="#/definitions/Empleado")
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
        $this->empleadoRepository->pushCriteria(new RequestCriteria($request));
        $this->empleadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $empleados = $this->empleadoRepository->all();

        return $this->sendResponse($empleados->toArray(), 'Empleados retrieved successfully');
    }

    /**
     * @param CreateEmpleadoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/empleados",
     *      summary="Store a newly created Empleado in storage",
     *      tags={"Empleado"},
     *      description="Store Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Empleado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Empleado")
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
     *                  ref="#/definitions/Empleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        $empleados = $this->empleadoRepository->create($input);

        return $this->sendResponse($empleados->toArray(), 'Empleado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/empleados/{id}",
     *      summary="Display the specified Empleado",
     *      tags={"Empleado"},
     *      description="Get Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empleado",
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
     *                  ref="#/definitions/Empleado"
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
        /** @var Empleado $empleado */
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado not found');
        }

        return $this->sendResponse($empleado->toArray(), 'Empleado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEmpleadoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/empleados/{id}",
     *      summary="Update the specified Empleado in storage",
     *      tags={"Empleado"},
     *      description="Update Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empleado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Empleado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Empleado")
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
     *                  ref="#/definitions/Empleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Empleado $empleado */
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado not found');
        }

        $empleado = $this->empleadoRepository->update($input, $id);

        return $this->sendResponse($empleado->toArray(), 'Empleado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/empleados/{id}",
     *      summary="Remove the specified Empleado from storage",
     *      tags={"Empleado"},
     *      description="Delete Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empleado",
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
        /** @var Empleado $empleado */
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado not found');
        }

        $empleado->delete();

        return $this->sendResponse($id, 'Empleado deleted successfully');
    }
}
