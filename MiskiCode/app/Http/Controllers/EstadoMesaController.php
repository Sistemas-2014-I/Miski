<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstadoMesaRequest;
use App\Http\Requests\UpdateEstadoMesaRequest;
use App\Repositories\EstadoMesaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoMesaController extends AppBaseController
{
    /** @var  EstadoMesaRepository */
    private $estadoMesaRepository;

    public function __construct(EstadoMesaRepository $estadoMesaRepo)
    {
        $this->estadoMesaRepository = $estadoMesaRepo;
    }

    /**
     * Display a listing of the EstadoMesa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoMesaRepository->pushCriteria(new RequestCriteria($request));
        $estadoMesas = $this->estadoMesaRepository->all();

        return view('estado_mesas.index')
            ->with('estadoMesas', $estadoMesas);
    }

    /**
     * Show the form for creating a new EstadoMesa.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_mesas.create');
    }

    /**
     * Store a newly created EstadoMesa in storage.
     *
     * @param CreateEstadoMesaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoMesaRequest $request)
    {
        $input = $request->all();

        $estadoMesa = $this->estadoMesaRepository->create($input);

        Flash::success('Estado Mesa saved successfully.');

        return redirect(route('estadoMesas.index'));
    }

    /**
     * Display the specified EstadoMesa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            Flash::error('Estado Mesa not found');

            return redirect(route('estadoMesas.index'));
        }

        return view('estado_mesas.show')->with('estadoMesa', $estadoMesa);
    }

    /**
     * Show the form for editing the specified EstadoMesa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            Flash::error('Estado Mesa not found');

            return redirect(route('estadoMesas.index'));
        }

        return view('estado_mesas.edit')->with('estadoMesa', $estadoMesa);
    }

    /**
     * Update the specified EstadoMesa in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoMesaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoMesaRequest $request)
    {
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            Flash::error('Estado Mesa not found');

            return redirect(route('estadoMesas.index'));
        }

        $estadoMesa = $this->estadoMesaRepository->update($request->all(), $id);

        Flash::success('Estado Mesa updated successfully.');

        return redirect(route('estadoMesas.index'));
    }

    /**
     * Remove the specified EstadoMesa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoMesa = $this->estadoMesaRepository->findWithoutFail($id);

        if (empty($estadoMesa)) {
            Flash::error('Estado Mesa not found');

            return redirect(route('estadoMesas.index'));
        }

        $this->estadoMesaRepository->delete($id);

        Flash::success('Estado Mesa deleted successfully.');

        return redirect(route('estadoMesas.index'));
    }
}
