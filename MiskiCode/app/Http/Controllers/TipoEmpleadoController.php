<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoEmpleadoRequest;
use App\Http\Requests\UpdateTipoEmpleadoRequest;
use App\Repositories\TipoEmpleadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoEmpleadoController extends AppBaseController
{
    /** @var  TipoEmpleadoRepository */
    private $tipoEmpleadoRepository;

    public function __construct(TipoEmpleadoRepository $tipoEmpleadoRepo)
    {
        $this->tipoEmpleadoRepository = $tipoEmpleadoRepo;
    }

    /**
     * Display a listing of the TipoEmpleado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoEmpleadoRepository->pushCriteria(new RequestCriteria($request));
        $tipoEmpleados = $this->tipoEmpleadoRepository->all();

        return view('tipo_empleados.index')
            ->with('tipoEmpleados', $tipoEmpleados);
    }

    /**
     * Show the form for creating a new TipoEmpleado.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_empleados.create');
    }

    /**
     * Store a newly created TipoEmpleado in storage.
     *
     * @param CreateTipoEmpleadoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoEmpleadoRequest $request)
    {
        $input = $request->all();

        $tipoEmpleado = $this->tipoEmpleadoRepository->create($input);

        Flash::success('Tipo Empleado saved successfully.');

        return redirect(route('tipoEmpleados.index'));
    }

    /**
     * Display the specified TipoEmpleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            Flash::error('Tipo Empleado not found');

            return redirect(route('tipoEmpleados.index'));
        }

        return view('tipo_empleados.show')->with('tipoEmpleado', $tipoEmpleado);
    }

    /**
     * Show the form for editing the specified TipoEmpleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            Flash::error('Tipo Empleado not found');

            return redirect(route('tipoEmpleados.index'));
        }

        return view('tipo_empleados.edit')->with('tipoEmpleado', $tipoEmpleado);
    }

    /**
     * Update the specified TipoEmpleado in storage.
     *
     * @param  int              $id
     * @param UpdateTipoEmpleadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoEmpleadoRequest $request)
    {
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            Flash::error('Tipo Empleado not found');

            return redirect(route('tipoEmpleados.index'));
        }

        $tipoEmpleado = $this->tipoEmpleadoRepository->update($request->all(), $id);

        Flash::success('Tipo Empleado updated successfully.');

        return redirect(route('tipoEmpleados.index'));
    }

    /**
     * Remove the specified TipoEmpleado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoEmpleado = $this->tipoEmpleadoRepository->findWithoutFail($id);

        if (empty($tipoEmpleado)) {
            Flash::error('Tipo Empleado not found');

            return redirect(route('tipoEmpleados.index'));
        }

        $this->tipoEmpleadoRepository->delete($id);

        Flash::success('Tipo Empleado deleted successfully.');

        return redirect(route('tipoEmpleados.index'));
    }
}
