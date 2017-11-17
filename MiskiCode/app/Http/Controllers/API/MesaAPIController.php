<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMesaAPIRequest;
use App\Http\Requests\API\UpdateMesaAPIRequest;
use App\Models\Mesa;
use App\Repositories\MesaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MesaController
 * @package App\Http\Controllers\API
 */

class MesaAPIController extends AppBaseController
{
    /** @var  MesaRepository */
    private $mesaRepository;

    public function __construct(MesaRepository $mesaRepo)
    {
        $this->mesaRepository = $mesaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/mesas",
     *      summary="Get a listing of the Mesas.",
     *      tags={"Mesa"},
     *      description="Get all Mesas",
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
     *                  @SWG\Items(ref="#/definitions/Mesa")
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
        $this->mesaRepository->pushCriteria(new RequestCriteria($request));
        $this->mesaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mesas = $this->mesaRepository->all();

        return $this->sendResponse($mesas->toArray(), 'Mesas retrieved successfully');
    }

    /**
     * @param CreateMesaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/mesas",
     *      summary="Store a newly created Mesa in storage",
     *      tags={"Mesa"},
     *      description="Store Mesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mesa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mesa")
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
     *                  ref="#/definitions/Mesa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMesaAPIRequest $request)
    {
        $input = $request->all();

        $mesas = $this->mesaRepository->create($input);

        return $this->sendResponse($mesas->toArray(), 'Mesa saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/mesas/{id}",
     *      summary="Display the specified Mesa",
     *      tags={"Mesa"},
     *      description="Get Mesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mesa",
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
     *                  ref="#/definitions/Mesa"
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
        /** @var Mesa $mesa */
        $mesa = $this->mesaRepository->findWithoutFail($id);

        if (empty($mesa)) {
            return $this->sendError('Mesa not found');
        }

        return $this->sendResponse($mesa->toArray(), 'Mesa retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMesaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/mesas/{id}",
     *      summary="Update the specified Mesa in storage",
     *      tags={"Mesa"},
     *      description="Update Mesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mesa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mesa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mesa")
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
     *                  ref="#/definitions/Mesa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMesaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mesa $mesa */
        $mesa = $this->mesaRepository->findWithoutFail($id);

        if (empty($mesa)) {
            return $this->sendError('Mesa not found');
        }

        $mesa = $this->mesaRepository->update($input, $id);

        return $this->sendResponse($mesa->toArray(), 'Mesa updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/mesas/{id}",
     *      summary="Remove the specified Mesa from storage",
     *      tags={"Mesa"},
     *      description="Delete Mesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mesa",
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
        /** @var Mesa $mesa */
        $mesa = $this->mesaRepository->findWithoutFail($id);

        if (empty($mesa)) {
            return $this->sendError('Mesa not found');
        }

        $mesa->delete();

        return $this->sendResponse($id, 'Mesa deleted successfully');
    }
}
