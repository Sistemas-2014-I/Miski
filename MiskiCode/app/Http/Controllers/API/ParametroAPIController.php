<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParametroAPIRequest;
use App\Http\Requests\API\UpdateParametroAPIRequest;
use App\Models\Parametro;
use App\Repositories\ParametroRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ParametroController
 * @package App\Http\Controllers\API
 */

class ParametroAPIController extends AppBaseController
{
    /** @var  ParametroRepository */
    private $parametroRepository;

    public function __construct(ParametroRepository $parametroRepo)
    {
        $this->parametroRepository = $parametroRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/parametros",
     *      summary="Get a listing of the Parametros.",
     *      tags={"Parametro"},
     *      description="Get all Parametros",
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
     *                  @SWG\Items(ref="#/definitions/Parametro")
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
        $this->parametroRepository->pushCriteria(new RequestCriteria($request));
        $this->parametroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $parametros = $this->parametroRepository->all();

        return $this->sendResponse($parametros->toArray(), 'Parametros retrieved successfully');
    }

    /**
     * @param CreateParametroAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/parametros",
     *      summary="Store a newly created Parametro in storage",
     *      tags={"Parametro"},
     *      description="Store Parametro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Parametro that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Parametro")
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
     *                  ref="#/definitions/Parametro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateParametroAPIRequest $request)
    {
        $input = $request->all();

        $parametros = $this->parametroRepository->create($input);

        return $this->sendResponse($parametros->toArray(), 'Parametro saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/parametros/{id}",
     *      summary="Display the specified Parametro",
     *      tags={"Parametro"},
     *      description="Get Parametro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Parametro",
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
     *                  ref="#/definitions/Parametro"
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
        /** @var Parametro $parametro */
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            return $this->sendError('Parametro not found');
        }

        return $this->sendResponse($parametro->toArray(), 'Parametro retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateParametroAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parametros/{id}",
     *      summary="Update the specified Parametro in storage",
     *      tags={"Parametro"},
     *      description="Update Parametro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Parametro",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Parametro that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Parametro")
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
     *                  ref="#/definitions/Parametro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateParametroAPIRequest $request)
    {
        $input = $request->all();

        /** @var Parametro $parametro */
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            return $this->sendError('Parametro not found');
        }

        $parametro = $this->parametroRepository->update($input, $id);

        return $this->sendResponse($parametro->toArray(), 'Parametro updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/parametros/{id}",
     *      summary="Remove the specified Parametro from storage",
     *      tags={"Parametro"},
     *      description="Delete Parametro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Parametro",
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
        /** @var Parametro $parametro */
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            return $this->sendError('Parametro not found');
        }

        $parametro->delete();

        return $this->sendResponse($id, 'Parametro deleted successfully');
    }
}
