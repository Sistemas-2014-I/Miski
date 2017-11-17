<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePresentacionAPIRequest;
use App\Http\Requests\API\UpdatePresentacionAPIRequest;
use App\Models\Presentacion;
use App\Repositories\PresentacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PresentacionController
 * @package App\Http\Controllers\API
 */

class PresentacionAPIController extends AppBaseController
{
    /** @var  PresentacionRepository */
    private $presentacionRepository;

    public function __construct(PresentacionRepository $presentacionRepo)
    {
        $this->presentacionRepository = $presentacionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/presentacions",
     *      summary="Get a listing of the Presentacions.",
     *      tags={"Presentacion"},
     *      description="Get all Presentacions",
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
     *                  @SWG\Items(ref="#/definitions/Presentacion")
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
        $this->presentacionRepository->pushCriteria(new RequestCriteria($request));
        $this->presentacionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $presentacions = $this->presentacionRepository->all();

        return $this->sendResponse($presentacions->toArray(), 'Presentacions retrieved successfully');
    }

    /**
     * @param CreatePresentacionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/presentacions",
     *      summary="Store a newly created Presentacion in storage",
     *      tags={"Presentacion"},
     *      description="Store Presentacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Presentacion that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Presentacion")
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
     *                  ref="#/definitions/Presentacion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePresentacionAPIRequest $request)
    {
        $input = $request->all();

        $presentacions = $this->presentacionRepository->create($input);

        return $this->sendResponse($presentacions->toArray(), 'Presentacion saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/presentacions/{id}",
     *      summary="Display the specified Presentacion",
     *      tags={"Presentacion"},
     *      description="Get Presentacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Presentacion",
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
     *                  ref="#/definitions/Presentacion"
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
        /** @var Presentacion $presentacion */
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            return $this->sendError('Presentacion not found');
        }

        return $this->sendResponse($presentacion->toArray(), 'Presentacion retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePresentacionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/presentacions/{id}",
     *      summary="Update the specified Presentacion in storage",
     *      tags={"Presentacion"},
     *      description="Update Presentacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Presentacion",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Presentacion that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Presentacion")
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
     *                  ref="#/definitions/Presentacion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePresentacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Presentacion $presentacion */
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            return $this->sendError('Presentacion not found');
        }

        $presentacion = $this->presentacionRepository->update($input, $id);

        return $this->sendResponse($presentacion->toArray(), 'Presentacion updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/presentacions/{id}",
     *      summary="Remove the specified Presentacion from storage",
     *      tags={"Presentacion"},
     *      description="Delete Presentacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Presentacion",
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
        /** @var Presentacion $presentacion */
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            return $this->sendError('Presentacion not found');
        }

        $presentacion->delete();

        return $this->sendResponse($id, 'Presentacion deleted successfully');
    }
}
