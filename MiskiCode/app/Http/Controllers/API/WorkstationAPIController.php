<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWorkstationAPIRequest;
use App\Http\Requests\API\UpdateWorkstationAPIRequest;
use App\Models\Workstation;
use App\Repositories\WorkstationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WorkstationController
 * @package App\Http\Controllers\API
 */

class WorkstationAPIController extends AppBaseController
{
    /** @var  WorkstationRepository */
    private $workstationRepository;

    public function __construct(WorkstationRepository $workstationRepo)
    {
        $this->workstationRepository = $workstationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/workstations",
     *      summary="Get a listing of the Workstations.",
     *      tags={"Workstation"},
     *      description="Get all Workstations",
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
     *                  @SWG\Items(ref="#/definitions/Workstation")
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
        $this->workstationRepository->pushCriteria(new RequestCriteria($request));
        $this->workstationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $workstations = $this->workstationRepository->all();

        return $this->sendResponse($workstations->toArray(), 'Workstations retrieved successfully');
    }

    /**
     * @param CreateWorkstationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/workstations",
     *      summary="Store a newly created Workstation in storage",
     *      tags={"Workstation"},
     *      description="Store Workstation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Workstation that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Workstation")
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
     *                  ref="#/definitions/Workstation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkstationAPIRequest $request)
    {
        $input = $request->all();

        $workstations = $this->workstationRepository->create($input);

        return $this->sendResponse($workstations->toArray(), 'Workstation saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/workstations/{id}",
     *      summary="Display the specified Workstation",
     *      tags={"Workstation"},
     *      description="Get Workstation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Workstation",
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
     *                  ref="#/definitions/Workstation"
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
        /** @var Workstation $workstation */
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            return $this->sendError('Workstation not found');
        }

        return $this->sendResponse($workstation->toArray(), 'Workstation retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateWorkstationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/workstations/{id}",
     *      summary="Update the specified Workstation in storage",
     *      tags={"Workstation"},
     *      description="Update Workstation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Workstation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Workstation that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Workstation")
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
     *                  ref="#/definitions/Workstation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkstationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Workstation $workstation */
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            return $this->sendError('Workstation not found');
        }

        $workstation = $this->workstationRepository->update($input, $id);

        return $this->sendResponse($workstation->toArray(), 'Workstation updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/workstations/{id}",
     *      summary="Remove the specified Workstation from storage",
     *      tags={"Workstation"},
     *      description="Delete Workstation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Workstation",
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
        /** @var Workstation $workstation */
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            return $this->sendError('Workstation not found');
        }

        $workstation->delete();

        return $this->sendResponse($id, 'Workstation deleted successfully');
    }
}
