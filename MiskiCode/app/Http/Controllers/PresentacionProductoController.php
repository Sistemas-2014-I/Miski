<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePresentacionProductoRequest;
use App\Http\Requests\UpdatePresentacionProductoRequest;
use App\Repositories\PresentacionProductoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PresentacionProductoController extends AppBaseController
{
    /** @var  PresentacionProductoRepository */
    private $presentacionProductoRepository;

    public function __construct(PresentacionProductoRepository $presentacionProductoRepo)
    {
        $this->presentacionProductoRepository = $presentacionProductoRepo;
    }

    /**
     * Display a listing of the PresentacionProducto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->presentacionProductoRepository->pushCriteria(new RequestCriteria($request));
        $presentacionProductos = $this->presentacionProductoRepository->all();

        return view('presentacion_productos.index')
            ->with('presentacionProductos', $presentacionProductos);
    }

    /**
     * Show the form for creating a new PresentacionProducto.
     *
     * @return Response
     */
    public function create()
    {
        return view('presentacion_productos.create');
    }

    /**
     * Store a newly created PresentacionProducto in storage.
     *
     * @param CreatePresentacionProductoRequest $request
     *
     * @return Response
     */
    public function store(CreatePresentacionProductoRequest $request)
    {
        $input = $request->all();

        $presentacionProducto = $this->presentacionProductoRepository->create($input);

        Flash::success('Presentacion Producto saved successfully.');

        return redirect(route('presentacionProductos.index'));
    }

    /**
     * Display the specified PresentacionProducto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            Flash::error('Presentacion Producto not found');

            return redirect(route('presentacionProductos.index'));
        }

        return view('presentacion_productos.show')->with('presentacionProducto', $presentacionProducto);
    }

    /**
     * Show the form for editing the specified PresentacionProducto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            Flash::error('Presentacion Producto not found');

            return redirect(route('presentacionProductos.index'));
        }

        return view('presentacion_productos.edit')->with('presentacionProducto', $presentacionProducto);
    }

    /**
     * Update the specified PresentacionProducto in storage.
     *
     * @param  int              $id
     * @param UpdatePresentacionProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePresentacionProductoRequest $request)
    {
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            Flash::error('Presentacion Producto not found');

            return redirect(route('presentacionProductos.index'));
        }

        $presentacionProducto = $this->presentacionProductoRepository->update($request->all(), $id);

        Flash::success('Presentacion Producto updated successfully.');

        return redirect(route('presentacionProductos.index'));
    }

    /**
     * Remove the specified PresentacionProducto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $presentacionProducto = $this->presentacionProductoRepository->findWithoutFail($id);

        if (empty($presentacionProducto)) {
            Flash::error('Presentacion Producto not found');

            return redirect(route('presentacionProductos.index'));
        }

        $this->presentacionProductoRepository->delete($id);

        Flash::success('Presentacion Producto deleted successfully.');

        return redirect(route('presentacionProductos.index'));
    }
}
