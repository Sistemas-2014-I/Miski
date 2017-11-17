<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeccionRequest;
use App\Http\Requests\UpdateSeccionRequest;
use App\Repositories\SeccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SeccionController extends AppBaseController
{
    /** @var  SeccionRepository */
    private $seccionRepository;

    public function __construct(SeccionRepository $seccionRepo)
    {
        $this->seccionRepository = $seccionRepo;
    }

    /**
     * Display a listing of the Seccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seccionRepository->pushCriteria(new RequestCriteria($request));
        $seccions = $this->seccionRepository->all();

        return view('seccions.index')
            ->with('seccions', $seccions);
    }

    /**
     * Show the form for creating a new Seccion.
     *
     * @return Response
     */
    public function create()
    {
        return view('seccions.create');
    }

    /**
     * Store a newly created Seccion in storage.
     *
     * @param CreateSeccionRequest $request
     *
     * @return Response
     */
    public function store(CreateSeccionRequest $request)
    {
        $input = $request->all();

        $seccion = $this->seccionRepository->create($input);

        Flash::success('Seccion saved successfully.');

        return redirect(route('seccions.index'));
    }

    /**
     * Display the specified Seccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('Seccion not found');

            return redirect(route('seccions.index'));
        }

        return view('seccions.show')->with('seccion', $seccion);
    }

    /**
     * Show the form for editing the specified Seccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('Seccion not found');

            return redirect(route('seccions.index'));
        }

        return view('seccions.edit')->with('seccion', $seccion);
    }

    /**
     * Update the specified Seccion in storage.
     *
     * @param  int              $id
     * @param UpdateSeccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeccionRequest $request)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('Seccion not found');

            return redirect(route('seccions.index'));
        }

        $seccion = $this->seccionRepository->update($request->all(), $id);

        Flash::success('Seccion updated successfully.');

        return redirect(route('seccions.index'));
    }

    /**
     * Remove the specified Seccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('Seccion not found');

            return redirect(route('seccions.index'));
        }

        $this->seccionRepository->delete($id);

        Flash::success('Seccion deleted successfully.');

        return redirect(route('seccions.index'));
    }
}
