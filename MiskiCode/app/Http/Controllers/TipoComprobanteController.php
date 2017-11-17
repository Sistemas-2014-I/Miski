<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoComprobanteRequest;
use App\Http\Requests\UpdateTipoComprobanteRequest;
use App\Repositories\TipoComprobanteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoComprobanteController extends AppBaseController
{
    /** @var  TipoComprobanteRepository */
    private $tipoComprobanteRepository;

    public function __construct(TipoComprobanteRepository $tipoComprobanteRepo)
    {
        $this->tipoComprobanteRepository = $tipoComprobanteRepo;
    }

    /**
     * Display a listing of the TipoComprobante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoComprobanteRepository->pushCriteria(new RequestCriteria($request));
        $tipoComprobantes = $this->tipoComprobanteRepository->all();

        return view('tipo_comprobantes.index')
            ->with('tipoComprobantes', $tipoComprobantes);
    }

    /**
     * Show the form for creating a new TipoComprobante.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_comprobantes.create');
    }

    /**
     * Store a newly created TipoComprobante in storage.
     *
     * @param CreateTipoComprobanteRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoComprobanteRequest $request)
    {
        $input = $request->all();

        $tipoComprobante = $this->tipoComprobanteRepository->create($input);

        Flash::success('Tipo Comprobante saved successfully.');

        return redirect(route('tipoComprobantes.index'));
    }

    /**
     * Display the specified TipoComprobante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            Flash::error('Tipo Comprobante not found');

            return redirect(route('tipoComprobantes.index'));
        }

        return view('tipo_comprobantes.show')->with('tipoComprobante', $tipoComprobante);
    }

    /**
     * Show the form for editing the specified TipoComprobante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            Flash::error('Tipo Comprobante not found');

            return redirect(route('tipoComprobantes.index'));
        }

        return view('tipo_comprobantes.edit')->with('tipoComprobante', $tipoComprobante);
    }

    /**
     * Update the specified TipoComprobante in storage.
     *
     * @param  int              $id
     * @param UpdateTipoComprobanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoComprobanteRequest $request)
    {
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            Flash::error('Tipo Comprobante not found');

            return redirect(route('tipoComprobantes.index'));
        }

        $tipoComprobante = $this->tipoComprobanteRepository->update($request->all(), $id);

        Flash::success('Tipo Comprobante updated successfully.');

        return redirect(route('tipoComprobantes.index'));
    }

    /**
     * Remove the specified TipoComprobante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoComprobante = $this->tipoComprobanteRepository->findWithoutFail($id);

        if (empty($tipoComprobante)) {
            Flash::error('Tipo Comprobante not found');

            return redirect(route('tipoComprobantes.index'));
        }

        $this->tipoComprobanteRepository->delete($id);

        Flash::success('Tipo Comprobante deleted successfully.');

        return redirect(route('tipoComprobantes.index'));
    }
}
