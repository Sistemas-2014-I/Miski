<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComprobanteRequest;
use App\Http\Requests\UpdateComprobanteRequest;
use App\Repositories\ComprobanteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ComprobanteController extends AppBaseController
{
    /** @var  ComprobanteRepository */
    private $comprobanteRepository;

    public function __construct(ComprobanteRepository $comprobanteRepo)
    {
        $this->comprobanteRepository = $comprobanteRepo;
    }

    /**
     * Display a listing of the Comprobante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comprobanteRepository->pushCriteria(new RequestCriteria($request));
        $comprobantes = $this->comprobanteRepository->all();

        return view('comprobantes.index')
            ->with('comprobantes', $comprobantes);
    }

    /**
     * Show the form for creating a new Comprobante.
     *
     * @return Response
     */
    public function create()
    {
        return view('comprobantes.create');
    }

    /**
     * Store a newly created Comprobante in storage.
     *
     * @param CreateComprobanteRequest $request
     *
     * @return Response
     */
    public function store(CreateComprobanteRequest $request)
    {
        $input = $request->all();

        $comprobante = $this->comprobanteRepository->create($input);

        Flash::success('Comprobante saved successfully.');

        return redirect(route('comprobantes.index'));
    }

    /**
     * Display the specified Comprobante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            Flash::error('Comprobante not found');

            return redirect(route('comprobantes.index'));
        }

        return view('comprobantes.show')->with('comprobante', $comprobante);
    }

    /**
     * Show the form for editing the specified Comprobante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            Flash::error('Comprobante not found');

            return redirect(route('comprobantes.index'));
        }

        return view('comprobantes.edit')->with('comprobante', $comprobante);
    }

    /**
     * Update the specified Comprobante in storage.
     *
     * @param  int              $id
     * @param UpdateComprobanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComprobanteRequest $request)
    {
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            Flash::error('Comprobante not found');

            return redirect(route('comprobantes.index'));
        }

        $comprobante = $this->comprobanteRepository->update($request->all(), $id);

        Flash::success('Comprobante updated successfully.');

        return redirect(route('comprobantes.index'));
    }

    /**
     * Remove the specified Comprobante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comprobante = $this->comprobanteRepository->findWithoutFail($id);

        if (empty($comprobante)) {
            Flash::error('Comprobante not found');

            return redirect(route('comprobantes.index'));
        }

        $this->comprobanteRepository->delete($id);

        Flash::success('Comprobante deleted successfully.');

        return redirect(route('comprobantes.index'));
    }
}
