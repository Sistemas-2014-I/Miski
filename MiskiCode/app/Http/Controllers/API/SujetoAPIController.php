<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSujetoAPIRequest;
use App\Http\Requests\API\UpdateSujetoAPIRequest;
use App\Models\Sujeto;
use App\Repositories\SujetoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SujetoController
 * @package App\Http\Controllers\API
 */

class SujetoAPIController extends AppBaseController
{
    /** @var  SujetoRepository */
    private $sujetoRepository;

    public function __construct(SujetoRepository $sujetoRepo)
    {
        $this->sujetoRepository = $sujetoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sujetos",
     *      summary="Get a listing of the Sujetos.",
     *      tags={"Sujeto"},
     *      description="Get all Sujetos",
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
     *                  @SWG\Items(ref="#/definitions/Sujeto")
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
        $this->sujetoRepository->pushCriteria(new RequestCriteria($request));
        $this->sujetoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sujetos = $this->sujetoRepository->all();

        return $this->sendResponse($sujetos->toArray(), 'Sujetos retrieved successfully');
    }

    /**
     * @param CreateSujetoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sujetos",
     *      summary="Store a newly created Sujeto in storage",
     *      tags={"Sujeto"},
     *      description="Store Sujeto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sujeto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sujeto")
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
     *                  ref="#/definitions/Sujeto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSujetoAPIRequest $request)
    {
        $input = $request->all();

        $sujetos = $this->sujetoRepository->create($input);

        return $this->sendResponse($sujetos->toArray(), 'Sujeto saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sujetos/{id}",
     *      summary="Display the specified Sujeto",
     *      tags={"Sujeto"},
     *      description="Get Sujeto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sujeto",
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
     *                  ref="#/definitions/Sujeto"
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
        /** @var Sujeto $sujeto */
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            return $this->sendError('Sujeto not found');
        }

        return $this->sendResponse($sujeto->toArray(), 'Sujeto retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSujetoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sujetos/{id}",
     *      summary="Update the specified Sujeto in storage",
     *      tags={"Sujeto"},
     *      description="Update Sujeto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sujeto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sujeto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sujeto")
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
     *                  ref="#/definitions/Sujeto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSujetoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sujeto $sujeto */
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            return $this->sendError('Sujeto not found');
        }

        $sujeto = $this->sujetoRepository->update($input, $id);

        return $this->sendResponse($sujeto->toArray(), 'Sujeto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sujetos/{id}",
     *      summary="Remove the specified Sujeto from storage",
     *      tags={"Sujeto"},
     *      description="Delete Sujeto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sujeto",
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
        /** @var Sujeto $sujeto */
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            return $this->sendError('Sujeto not found');
        }

        $sujeto->delete();

        return $this->sendResponse($id, 'Sujeto deleted successfully');
    }
}
