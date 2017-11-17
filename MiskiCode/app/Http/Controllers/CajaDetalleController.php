<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCajaDetalleRequest;
use App\Http\Requests\UpdateCajaDetalleRequest;
use App\Repositories\CajaDetalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CajaDetalleController extends AppBaseController
{
    /** @var  CajaDetalleRepository */
    private $cajaDetalleRepository;

    public function __construct(CajaDetalleRepository $cajaDetalleRepo)
    {
        $this->cajaDetalleRepository = $cajaDetalleRepo;
    }

    /**
     * Display a listing of the CajaDetalle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cajaDetalleRepository->pushCriteria(new RequestCriteria($request));
        $cajaDetalles = $this->cajaDetalleRepository->all();

        return view('caja_detalles.index')
            ->with('cajaDetalles', $cajaDetalles);
    }

    /**
     * Show the form for creating a new CajaDetalle.
     *
     * @return Response
     */
    public function create()
    {
        return view('caja_detalles.create');
    }

    /**
     * Store a newly created CajaDetalle in storage.
     *
     * @param CreateCajaDetalleRequest $request
     *
     * @return Response
     */
    public function store(CreateCajaDetalleRequest $request)
    {
        $input = $request->all();

        $cajaDetalle = $this->cajaDetalleRepository->create($input);

        Flash::success('Caja Detalle saved successfully.');

        return redirect(route('cajaDetalles.index'));
    }

    /**
     * Display the specified CajaDetalle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            Flash::error('Caja Detalle not found');

            return redirect(route('cajaDetalles.index'));
        }

        return view('caja_detalles.show')->with('cajaDetalle', $cajaDetalle);
    }

    /**
     * Show the form for editing the specified CajaDetalle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            Flash::error('Caja Detalle not found');

            return redirect(route('cajaDetalles.index'));
        }

        return view('caja_detalles.edit')->with('cajaDetalle', $cajaDetalle);
    }

    /**
     * Update the specified CajaDetalle in storage.
     *
     * @param  int              $id
     * @param UpdateCajaDetalleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCajaDetalleRequest $request)
    {
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            Flash::error('Caja Detalle not found');

            return redirect(route('cajaDetalles.index'));
        }

        $cajaDetalle = $this->cajaDetalleRepository->update($request->all(), $id);

        Flash::success('Caja Detalle updated successfully.');

        return redirect(route('cajaDetalles.index'));
    }

    /**
     * Remove the specified CajaDetalle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cajaDetalle = $this->cajaDetalleRepository->findWithoutFail($id);

        if (empty($cajaDetalle)) {
            Flash::error('Caja Detalle not found');

            return redirect(route('cajaDetalles.index'));
        }

        $this->cajaDetalleRepository->delete($id);

        Flash::success('Caja Detalle deleted successfully.');

        return redirect(route('cajaDetalles.index'));
    }
}
