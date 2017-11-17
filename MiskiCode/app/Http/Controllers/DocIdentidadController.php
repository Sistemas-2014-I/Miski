<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocIdentidadRequest;
use App\Http\Requests\UpdateDocIdentidadRequest;
use App\Repositories\DocIdentidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DocIdentidadController extends AppBaseController
{
    /** @var  DocIdentidadRepository */
    private $docIdentidadRepository;

    public function __construct(DocIdentidadRepository $docIdentidadRepo)
    {
        $this->docIdentidadRepository = $docIdentidadRepo;
    }

    /**
     * Display a listing of the DocIdentidad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->docIdentidadRepository->pushCriteria(new RequestCriteria($request));
        $docIdentidads = $this->docIdentidadRepository->all();

        return view('doc_identidads.index')
            ->with('docIdentidads', $docIdentidads);
    }

    /**
     * Show the form for creating a new DocIdentidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('doc_identidads.create');
    }

    /**
     * Store a newly created DocIdentidad in storage.
     *
     * @param CreateDocIdentidadRequest $request
     *
     * @return Response
     */
    public function store(CreateDocIdentidadRequest $request)
    {
        $input = $request->all();

        $docIdentidad = $this->docIdentidadRepository->create($input);

        Flash::success('Doc Identidad saved successfully.');

        return redirect(route('docIdentidads.index'));
    }

    /**
     * Display the specified DocIdentidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            Flash::error('Doc Identidad not found');

            return redirect(route('docIdentidads.index'));
        }

        return view('doc_identidads.show')->with('docIdentidad', $docIdentidad);
    }

    /**
     * Show the form for editing the specified DocIdentidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            Flash::error('Doc Identidad not found');

            return redirect(route('docIdentidads.index'));
        }

        return view('doc_identidads.edit')->with('docIdentidad', $docIdentidad);
    }

    /**
     * Update the specified DocIdentidad in storage.
     *
     * @param  int              $id
     * @param UpdateDocIdentidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocIdentidadRequest $request)
    {
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            Flash::error('Doc Identidad not found');

            return redirect(route('docIdentidads.index'));
        }

        $docIdentidad = $this->docIdentidadRepository->update($request->all(), $id);

        Flash::success('Doc Identidad updated successfully.');

        return redirect(route('docIdentidads.index'));
    }

    /**
     * Remove the specified DocIdentidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $docIdentidad = $this->docIdentidadRepository->findWithoutFail($id);

        if (empty($docIdentidad)) {
            Flash::error('Doc Identidad not found');

            return redirect(route('docIdentidads.index'));
        }

        $this->docIdentidadRepository->delete($id);

        Flash::success('Doc Identidad deleted successfully.');

        return redirect(route('docIdentidads.index'));
    }
}
