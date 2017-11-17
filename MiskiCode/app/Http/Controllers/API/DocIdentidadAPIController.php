<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDocIdentidadAPIRequest;
use App\Http\Requests\API\UpdateDocIdentidadAPIRequest;
use App\Models\DocIdentidad;
use App\Repositories\DocIdentidadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DocIdentidadController
 * @package App\Http\Controllers\API
 */

class DocIdentidadAPIController extends AppBaseController
{
    /** @var  DocIdentidadRepository */
    private $docIdentidadRepository;

    public function __construct(DocIdentidadRepository $docIdentidadRepo)
    {
        $this->docIdentidadRepository = $docIdentidadRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/docIdentidads",
     *      summary="Get a listing of the DocIdentidads.",
     *      tags={"DocIdentidad"},
     *      description="Get all DocIdentidads",
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
     *                  @SWG\Items(ref="#/definitions/DocIdentidad")
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
        $this->docIdentidadRepository->pushCriteria(new RequestCriteria($request));
        $this->docIdentidadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $docIdentidads = $this->docIdentidadRepository->all();

        return $this->sendResponse($docIdentidads->toArray(), 'Doc Identidads retrieved successfully');
    }

    /**
     * @param CreateDocIdentidadAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/docIdentidads",
     *      summary="Store a newly created DocIdentidad in storage",
     *      tags={"DocIdentidad"},
     *      description="Store DocIdentidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DocIdentidad that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DocIdentidad")
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
     *                  ref="#/definitions/DocIdentidad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDocIdentidadAPIRequest $request)
    {
        $input = $request->all();

        $docIdentidads = $this->docIdentidadRepository->create($input);

        return $this->sendResponse($docIdentidads->toArray(), 'Doc Identidad saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/docIdentidads/{id}",
     *      summary="Display the specified DocIdentidad",
     *      tags={"DocIdentidad"},
     *      description="Get DocIdentidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DocIdentidad",
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
     *                  ref="#/definitions/DocIdentidad"
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
        /** @var DocIdentidad $docIdentidad */
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            return $this->sendError('Doc Identidad not found');
        }

        return $this->sendResponse($docIdentidad->toArray(), 'Doc Identidad retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDocIdentidadAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/docIdentidads/{id}",
     *      summary="Update the specified DocIdentidad in storage",
     *      tags={"DocIdentidad"},
     *      description="Update DocIdentidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DocIdentidad",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DocIdentidad that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DocIdentidad")
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
     *                  ref="#/definitions/DocIdentidad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDocIdentidadAPIRequest $request)
    {
        $input = $request->all();

        /** @var DocIdentidad $docIdentidad */
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            return $this->sendError('Doc Identidad not found');
        }

        $docIdentidad = $this->docIdentidadRepository->update($input, $id);

        return $this->sendResponse($docIdentidad->toArray(), 'DocIdentidad updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/docIdentidads/{id}",
     *      summary="Remove the specified DocIdentidad from storage",
     *      tags={"DocIdentidad"},
     *      description="Delete DocIdentidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DocIdentidad",
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
        /** @var DocIdentidad $docIdentidad */
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            return $this->sendError('Doc Identidad not found');
        }

        $docIdentidad->delete();

        return $this->sendResponse($id, 'Doc Identidad deleted successfully');
    }
}
