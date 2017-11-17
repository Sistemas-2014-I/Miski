<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstadoPedidoRequest;
use App\Http\Requests\UpdateEstadoPedidoRequest;
use App\Repositories\EstadoPedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoPedidoController extends AppBaseController
{
    /** @var  EstadoPedidoRepository */
    private $estadoPedidoRepository;

    public function __construct(EstadoPedidoRepository $estadoPedidoRepo)
    {
        $this->estadoPedidoRepository = $estadoPedidoRepo;
    }

    /**
     * Display a listing of the EstadoPedido.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoPedidoRepository->pushCriteria(new RequestCriteria($request));
        $estadoPedidos = $this->estadoPedidoRepository->all();

        return view('estado_pedidos.index')
            ->with('estadoPedidos', $estadoPedidos);
    }

    /**
     * Show the form for creating a new EstadoPedido.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_pedidos.create');
    }

    /**
     * Store a newly created EstadoPedido in storage.
     *
     * @param CreateEstadoPedidoRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoPedidoRequest $request)
    {
        $input = $request->all();

        $estadoPedido = $this->estadoPedidoRepository->create($input);

        Flash::success('Estado Pedido saved successfully.');

        return redirect(route('estadoPedidos.index'));
    }

    /**
     * Display the specified EstadoPedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            Flash::error('Estado Pedido not found');

            return redirect(route('estadoPedidos.index'));
        }

        return view('estado_pedidos.show')->with('estadoPedido', $estadoPedido);
    }

    /**
     * Show the form for editing the specified EstadoPedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            Flash::error('Estado Pedido not found');

            return redirect(route('estadoPedidos.index'));
        }

        return view('estado_pedidos.edit')->with('estadoPedido', $estadoPedido);
    }

    /**
     * Update the specified EstadoPedido in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoPedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoPedidoRequest $request)
    {
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            Flash::error('Estado Pedido not found');

            return redirect(route('estadoPedidos.index'));
        }

        $estadoPedido = $this->estadoPedidoRepository->update($request->all(), $id);

        Flash::success('Estado Pedido updated successfully.');

        return redirect(route('estadoPedidos.index'));
    }

    /**
     * Remove the specified EstadoPedido from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoPedido = $this->estadoPedidoRepository->findWithoutFail($id);

        if (empty($estadoPedido)) {
            Flash::error('Estado Pedido not found');

            return redirect(route('estadoPedidos.index'));
        }

        $this->estadoPedidoRepository->delete($id);

        Flash::success('Estado Pedido deleted successfully.');

        return redirect(route('estadoPedidos.index'));
    }
}
