<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePresentacionRequest;
use App\Http\Requests\UpdatePresentacionRequest;
use App\Repositories\PresentacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PresentacionController extends AppBaseController
{
    /** @var  PresentacionRepository */
    private $presentacionRepository;

    public function __construct(PresentacionRepository $presentacionRepo)
    {
        $this->presentacionRepository = $presentacionRepo;
    }

    /**
     * Display a listing of the Presentacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->presentacionRepository->pushCriteria(new RequestCriteria($request));
        $presentacions = $this->presentacionRepository->all();

        return view('presentacions.index')
            ->with('presentacions', $presentacions);
    }

    /**
     * Show the form for creating a new Presentacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('presentacions.create');
    }

    /**
     * Store a newly created Presentacion in storage.
     *
     * @param CreatePresentacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePresentacionRequest $request)
    {
        $input = $request->all();

        $presentacion = $this->presentacionRepository->create($input);

        Flash::success('Presentacion saved successfully.');

        return redirect(route('presentacions.index'));
    }

    /**
     * Display the specified Presentacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            Flash::error('Presentacion not found');

            return redirect(route('presentacions.index'));
        }

        return view('presentacions.show')->with('presentacion', $presentacion);
    }

    /**
     * Show the form for editing the specified Presentacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            Flash::error('Presentacion not found');

            return redirect(route('presentacions.index'));
        }

        return view('presentacions.edit')->with('presentacion', $presentacion);
    }

    /**
     * Update the specified Presentacion in storage.
     *
     * @param  int              $id
     * @param UpdatePresentacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePresentacionRequest $request)
    {
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            Flash::error('Presentacion not found');

            return redirect(route('presentacions.index'));
        }

        $presentacion = $this->presentacionRepository->update($request->all(), $id);

        Flash::success('Presentacion updated successfully.');

        return redirect(route('presentacions.index'));
    }

    /**
     * Remove the specified Presentacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $presentacion = $this->presentacionRepository->findWithoutFail($id);

        if (empty($presentacion)) {
            Flash::error('Presentacion not found');

            return redirect(route('presentacions.index'));
        }

        $this->presentacionRepository->delete($id);

        Flash::success('Presentacion deleted successfully.');

        return redirect(route('presentacions.index'));
    }
}
