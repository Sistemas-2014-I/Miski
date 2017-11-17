<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComprobanteDetalleRequest;
use App\Http\Requests\UpdateComprobanteDetalleRequest;
use App\Repositories\ComprobanteDetalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ComprobanteDetalleController extends AppBaseController
{
    /** @var  ComprobanteDetalleRepository */
    private $comprobanteDetalleRepository;

    public function __construct(ComprobanteDetalleRepository $comprobanteDetalleRepo)
    {
        $this->comprobanteDetalleRepository = $comprobanteDetalleRepo;
    }

    /**
     * Display a listing of the ComprobanteDetalle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comprobanteDetalleRepository->pushCriteria(new RequestCriteria($request));
        $comprobanteDetalles = $this->comprobanteDetalleRepository->all();

        return view('comprobante_detalles.index')
            ->with('comprobanteDetalles', $comprobanteDetalles);
    }

    /**
     * Show the form for creating a new ComprobanteDetalle.
     *
     * @return Response
     */
    public function create()
    {
        return view('comprobante_detalles.create');
    }

    /**
     * Store a newly created ComprobanteDetalle in storage.
     *
     * @param CreateComprobanteDetalleRequest $request
     *
     * @return Response
     */
    public function store(CreateComprobanteDetalleRequest $request)
    {
        $input = $request->all();

        $comprobanteDetalle = $this->comprobanteDetalleRepository->create($input);

        Flash::success('Comprobante Detalle saved successfully.');

        return redirect(route('comprobanteDetalles.index'));
    }

    /**
     * Display the specified ComprobanteDetalle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            Flash::error('Comprobante Detalle not found');

            return redirect(route('comprobanteDetalles.index'));
        }

        return view('comprobante_detalles.show')->with('comprobanteDetalle', $comprobanteDetalle);
    }

    /**
     * Show the form for editing the specified ComprobanteDetalle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            Flash::error('Comprobante Detalle not found');

            return redirect(route('comprobanteDetalles.index'));
        }

        return view('comprobante_detalles.edit')->with('comprobanteDetalle', $comprobanteDetalle);
    }

    /**
     * Update the specified ComprobanteDetalle in storage.
     *
     * @param  int              $id
     * @param UpdateComprobanteDetalleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComprobanteDetalleRequest $request)
    {
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            Flash::error('Comprobante Detalle not found');

            return redirect(route('comprobanteDetalles.index'));
        }

        $comprobanteDetalle = $this->comprobanteDetalleRepository->update($request->all(), $id);

        Flash::success('Comprobante Detalle updated successfully.');

        return redirect(route('comprobanteDetalles.index'));
    }

    /**
     * Remove the specified ComprobanteDetalle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comprobanteDetalle = $this->comprobanteDetalleRepository->findWithoutFail($id);

        if (empty($comprobanteDetalle)) {
            Flash::error('Comprobante Detalle not found');

            return redirect(route('comprobanteDetalles.index'));
        }

        $this->comprobanteDetalleRepository->delete($id);

        Flash::success('Comprobante Detalle deleted successfully.');

        return redirect(route('comprobanteDetalles.index'));
    }
}
