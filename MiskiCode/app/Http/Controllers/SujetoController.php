<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSujetoRequest;
use App\Http\Requests\UpdateSujetoRequest;
use App\Repositories\SujetoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SujetoController extends AppBaseController
{
    /** @var  SujetoRepository */
    private $sujetoRepository;

    public function __construct(SujetoRepository $sujetoRepo)
    {
        $this->sujetoRepository = $sujetoRepo;
    }

    /**
     * Display a listing of the Sujeto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sujetoRepository->pushCriteria(new RequestCriteria($request));
        $sujetos = $this->sujetoRepository->all();

        return view('sujetos.index')
            ->with('sujetos', $sujetos);
    }

    /**
     * Show the form for creating a new Sujeto.
     *
     * @return Response
     */
    public function create()
    {
        return view('sujetos.create');
    }

    /**
     * Store a newly created Sujeto in storage.
     *
     * @param CreateSujetoRequest $request
     *
     * @return Response
     */
    public function store(CreateSujetoRequest $request)
    {
        $input = $request->all();

        $sujeto = $this->sujetoRepository->create($input);

        Flash::success('Sujeto saved successfully.');

        return redirect(route('sujetos.index'));
    }

    /**
     * Display the specified Sujeto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            Flash::error('Sujeto not found');

            return redirect(route('sujetos.index'));
        }

        return view('sujetos.show')->with('sujeto', $sujeto);
    }

    /**
     * Show the form for editing the specified Sujeto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            Flash::error('Sujeto not found');

            return redirect(route('sujetos.index'));
        }

        return view('sujetos.edit')->with('sujeto', $sujeto);
    }

    /**
     * Update the specified Sujeto in storage.
     *
     * @param  int              $id
     * @param UpdateSujetoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSujetoRequest $request)
    {
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            Flash::error('Sujeto not found');

            return redirect(route('sujetos.index'));
        }

        $sujeto = $this->sujetoRepository->update($request->all(), $id);

        Flash::success('Sujeto updated successfully.');

        return redirect(route('sujetos.index'));
    }

    /**
     * Remove the specified Sujeto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sujeto = $this->sujetoRepository->findWithoutFail($id);

        if (empty($sujeto)) {
            Flash::error('Sujeto not found');

            return redirect(route('sujetos.index'));
        }

        $this->sujetoRepository->delete($id);

        Flash::success('Sujeto deleted successfully.');

        return redirect(route('sujetos.index'));
    }
}
