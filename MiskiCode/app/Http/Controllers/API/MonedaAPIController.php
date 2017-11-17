<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMonedaAPIRequest;
use App\Http\Requests\API\UpdateMonedaAPIRequest;
use App\Models\Moneda;
use App\Repositories\MonedaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MonedaController
 * @package App\Http\Controllers\API
 */

class MonedaAPIController extends AppBaseController
{
    /** @var  MonedaRepository */
    private $monedaRepository;

    public function __construct(MonedaRepository $monedaRepo)
    {
        $this->monedaRepository = $monedaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/monedas",
     *      summary="Get a listing of the Monedas.",
     *      tags={"Moneda"},
     *      description="Get all Monedas",
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
     *                  @SWG\Items(ref="#/definitions/Moneda")
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
        $this->monedaRepository->pushCriteria(new RequestCriteria($request));
        $this->monedaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $monedas = $this->monedaRepository->all();

        return $this->sendResponse($monedas->toArray(), 'Monedas retrieved successfully');
    }

    /**
     * @param CreateMonedaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/monedas",
     *      summary="Store a newly created Moneda in storage",
     *      tags={"Moneda"},
     *      description="Store Moneda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Moneda that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Moneda")
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
     *                  ref="#/definitions/Moneda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMonedaAPIRequest $request)
    {
        $input = $request->all();

        $monedas = $this->monedaRepository->create($input);

        return $this->sendResponse($monedas->toArray(), 'Moneda saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/monedas/{id}",
     *      summary="Display the specified Moneda",
     *      tags={"Moneda"},
     *      description="Get Moneda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Moneda",
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
     *                  ref="#/definitions/Moneda"
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
        /** @var Moneda $moneda */
        $moneda = $this->monedaRepository->findWithoutFail($id);

        if (empty($moneda)) {
            return $this->sendError('Moneda not found');
        }

        return $this->sendResponse($moneda->toArray(), 'Moneda retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMonedaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/monedas/{id}",
     *      summary="Update the specified Moneda in storage",
     *      tags={"Moneda"},
     *      description="Update Moneda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Moneda",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Moneda that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Moneda")
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
     *                  ref="#/definitions/Moneda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMonedaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Moneda $moneda */
        $moneda = $this->monedaRepository->findWithoutFail($id);

        if (empty($moneda)) {
            return $this->sendError('Moneda not found');
        }

        $moneda = $this->monedaRepository->update($input, $id);

        return $this->sendResponse($moneda->toArray(), 'Moneda updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/monedas/{id}",
     *      summary="Remove the specified Moneda from storage",
     *      tags={"Moneda"},
     *      description="Delete Moneda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Moneda",
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
        /** @var Moneda $moneda */
        $moneda = $this->monedaRepository->findWithoutFail($id);

        if (empty($moneda)) {
            return $this->sendError('Moneda not found');
        }

        $moneda->delete();

        return $this->sendResponse($id, 'Moneda deleted successfully');
    }
}
