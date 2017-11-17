<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePisoAPIRequest;
use App\Http\Requests\API\UpdatePisoAPIRequest;
use App\Models\Piso;
use App\Repositories\PisoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PisoController
 * @package App\Http\Controllers\API
 */

class PisoAPIController extends AppBaseController
{
    /** @var  PisoRepository */
    private $pisoRepository;

    public function __construct(PisoRepository $pisoRepo)
    {
        $this->pisoRepository = $pisoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pisos",
     *      summary="Get a listing of the Pisos.",
     *      tags={"Piso"},
     *      description="Get all Pisos",
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
     *                  @SWG\Items(ref="#/definitions/Piso")
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
        $this->pisoRepository->pushCriteria(new RequestCriteria($request));
        $this->pisoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pisos = $this->pisoRepository->all();

        return $this->sendResponse($pisos->toArray(), 'Pisos retrieved successfully');
    }

    /**
     * @param CreatePisoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pisos",
     *      summary="Store a newly created Piso in storage",
     *      tags={"Piso"},
     *      description="Store Piso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Piso that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Piso")
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
     *                  ref="#/definitions/Piso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePisoAPIRequest $request)
    {
        $input = $request->all();

        $pisos = $this->pisoRepository->create($input);

        return $this->sendResponse($pisos->toArray(), 'Piso saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pisos/{id}",
     *      summary="Display the specified Piso",
     *      tags={"Piso"},
     *      description="Get Piso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Piso",
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
     *                  ref="#/definitions/Piso"
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
        /** @var Piso $piso */
        $piso = $this->pisoRepository->findWithoutFail($id);

        if (empty($piso)) {
            return $this->sendError('Piso not found');
        }

        return $this->sendResponse($piso->toArray(), 'Piso retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePisoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pisos/{id}",
     *      summary="Update the specified Piso in storage",
     *      tags={"Piso"},
     *      description="Update Piso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Piso",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Piso that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Piso")
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
     *                  ref="#/definitions/Piso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePisoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Piso $piso */
        $piso = $this->pisoRepository->findWithoutFail($id);

        if (empty($piso)) {
            return $this->sendError('Piso not found');
        }

        $piso = $this->pisoRepository->update($input, $id);

        return $this->sendResponse($piso->toArray(), 'Piso updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pisos/{id}",
     *      summary="Remove the specified Piso from storage",
     *      tags={"Piso"},
     *      description="Delete Piso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Piso",
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
        /** @var Piso $piso */
        $piso = $this->pisoRepository->findWithoutFail($id);

        if (empty($piso)) {
            return $this->sendError('Piso not found');
        }

        $piso->delete();

        return $this->sendResponse($id, 'Piso deleted successfully');
    }
}
