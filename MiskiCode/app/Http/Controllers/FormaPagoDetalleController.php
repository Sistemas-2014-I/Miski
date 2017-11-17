<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormaPagoDetalleRequest;
use App\Http\Requests\UpdateFormaPagoDetalleRequest;
use App\Repositories\FormaPagoDetalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FormaPagoDetalleController extends AppBaseController
{
    /** @var  FormaPagoDetalleRepository */
    private $formaPagoDetalleRepository;

    public function __construct(FormaPagoDetalleRepository $formaPagoDetalleRepo)
    {
        $this->formaPagoDetalleRepository = $formaPagoDetalleRepo;
    }

    /**
     * Display a listing of the FormaPagoDetalle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formaPagoDetalleRepository->pushCriteria(new RequestCriteria($request));
        $formaPagoDetalles = $this->formaPagoDetalleRepository->all();

        return view('forma_pago_detalles.index')
            ->with('formaPagoDetalles', $formaPagoDetalles);
    }

    /**
     * Show the form for creating a new FormaPagoDetalle.
     *
     * @return Response
     */
    public function create()
    {
        return view('forma_pago_detalles.create');
    }

    /**
     * Store a newly created FormaPagoDetalle in storage.
     *
     * @param CreateFormaPagoDetalleRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPagoDetalleRequest $request)
    {
        $input = $request->all();

        $formaPagoDetalle = $this->formaPagoDetalleRepository->create($input);

        Flash::success('Forma Pago Detalle saved successfully.');

        return redirect(route('formaPagoDetalles.index'));
    }

    /**
     * Display the specified FormaPagoDetalle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            Flash::error('Forma Pago Detalle not found');

            return redirect(route('formaPagoDetalles.index'));
        }

        return view('forma_pago_detalles.show')->with('formaPagoDetalle', $formaPagoDetalle);
    }

    /**
     * Show the form for editing the specified FormaPagoDetalle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            Flash::error('Forma Pago Detalle not found');

            return redirect(route('formaPagoDetalles.index'));
        }

        return view('forma_pago_detalles.edit')->with('formaPagoDetalle', $formaPagoDetalle);
    }

    /**
     * Update the specified FormaPagoDetalle in storage.
     *
     * @param  int              $id
     * @param UpdateFormaPagoDetalleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPagoDetalleRequest $request)
    {
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            Flash::error('Forma Pago Detalle not found');

            return redirect(route('formaPagoDetalles.index'));
        }

        $formaPagoDetalle = $this->formaPagoDetalleRepository->update($request->all(), $id);

        Flash::success('Forma Pago Detalle updated successfully.');

        return redirect(route('formaPagoDetalles.index'));
    }

    /**
     * Remove the specified FormaPagoDetalle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formaPagoDetalle = $this->formaPagoDetalleRepository->findWithoutFail($id);

        if (empty($formaPagoDetalle)) {
            Flash::error('Forma Pago Detalle not found');

            return redirect(route('formaPagoDetalles.index'));
        }

        $this->formaPagoDetalleRepository->delete($id);

        Flash::success('Forma Pago Detalle deleted successfully.');

        return redirect(route('formaPagoDetalles.index'));
    }
}
