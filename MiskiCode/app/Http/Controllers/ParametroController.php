<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParametroRequest;
use App\Http\Requests\UpdateParametroRequest;
use App\Repositories\ParametroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ParametroController extends AppBaseController
{
    /** @var  ParametroRepository */
    private $parametroRepository;

    public function __construct(ParametroRepository $parametroRepo)
    {
        $this->parametroRepository = $parametroRepo;
    }

    /**
     * Display a listing of the Parametro.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->parametroRepository->pushCriteria(new RequestCriteria($request));
        $parametros = $this->parametroRepository->all();

        return view('parametros.index')
            ->with('parametros', $parametros);
    }

    /**
     * Show the form for creating a new Parametro.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.create');
    }

    /**
     * Store a newly created Parametro in storage.
     *
     * @param CreateParametroRequest $request
     *
     * @return Response
     */
    public function store(CreateParametroRequest $request)
    {
        $input = $request->all();

        $parametro = $this->parametroRepository->create($input);

        Flash::success('Parametro saved successfully.');

        return redirect(route('parametros.index'));
    }

    /**
     * Display the specified Parametro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            Flash::error('Parametro not found');

            return redirect(route('parametros.index'));
        }

        return view('parametros.show')->with('parametro', $parametro);
    }

    /**
     * Show the form for editing the specified Parametro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            Flash::error('Parametro not found');

            return redirect(route('parametros.index'));
        }

        return view('parametros.edit')->with('parametro', $parametro);
    }

    /**
     * Update the specified Parametro in storage.
     *
     * @param  int              $id
     * @param UpdateParametroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParametroRequest $request)
    {
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            Flash::error('Parametro not found');

            return redirect(route('parametros.index'));
        }

        $parametro = $this->parametroRepository->update($request->all(), $id);

        Flash::success('Parametro updated successfully.');

        return redirect(route('parametros.index'));
    }

    /**
     * Remove the specified Parametro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parametro = $this->parametroRepository->findWithoutFail($id);

        if (empty($parametro)) {
            Flash::error('Parametro not found');

            return redirect(route('parametros.index'));
        }

        $this->parametroRepository->delete($id);

        Flash::success('Parametro deleted successfully.');

        return redirect(route('parametros.index'));
    }
}
