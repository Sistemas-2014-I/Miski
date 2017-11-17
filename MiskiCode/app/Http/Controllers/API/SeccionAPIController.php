<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSeccionAPIRequest;
use App\Http\Requests\API\UpdateSeccionAPIRequest;
use App\Models\Seccion;
use App\Repositories\SeccionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SeccionController
 * @package App\Http\Controllers\API
 */

class SeccionAPIController extends AppBaseController
{
    /** @var  SeccionRepository */
    private $seccionRepository;

    public function __construct(SeccionRepository $seccionRepo)
    {
        $this->seccionRepository = $seccionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/seccions",
     *      summary="Get a listing of the Seccions.",
     *      tags={"Seccion"},
     *      description="Get all Seccions",
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
     *                  @SWG\Items(ref="#/definitions/Seccion")
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
        $this->seccionRepository->pushCriteria(new RequestCriteria($request));
        $this->seccionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $seccions = $this->seccionRepository->all();

        return $this->sendResponse($seccions->toArray(), 'Seccions retrieved successfully');
    }

    /**
     * @param CreateSeccionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/seccions",
     *      summary="Store a newly created Seccion in storage",
     *      tags={"Seccion"},
     *      description="Store Seccion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Seccion that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Seccion")
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
     *                  ref="#/definitions/Seccion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSeccionAPIRequest $request)
    {
        $input = $request->all();

        $seccions = $this->seccionRepository->create($input);

        return $this->sendResponse($seccions->toArray(), 'Seccion saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/seccions/{id}",
     *      summary="Display the specified Seccion",
     *      tags={"Seccion"},
     *      description="Get Seccion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Seccion",
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
     *                  ref="#/definitions/Seccion"
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
        /** @var Seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        return $this->sendResponse($seccion->toArray(), 'Seccion retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSeccionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/seccions/{id}",
     *      summary="Update the specified Seccion in storage",
     *      tags={"Seccion"},
     *      description="Update Seccion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Seccion",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Seccion that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Seccion")
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
     *                  ref="#/definitions/Seccion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSeccionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        $seccion = $this->seccionRepository->update($input, $id);

        return $this->sendResponse($seccion->toArray(), 'Seccion updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/seccions/{id}",
     *      summary="Remove the specified Seccion from storage",
     *      tags={"Seccion"},
     *      description="Delete Seccion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Seccion",
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
        /** @var Seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        $seccion->delete();

        return $this->sendResponse($id, 'Seccion deleted successfully');
    }
}
