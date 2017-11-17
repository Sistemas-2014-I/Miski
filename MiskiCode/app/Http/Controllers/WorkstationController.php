<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkstationRequest;
use App\Http\Requests\UpdateWorkstationRequest;
use App\Repositories\WorkstationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorkstationController extends AppBaseController
{
    /** @var  WorkstationRepository */
    private $workstationRepository;

    public function __construct(WorkstationRepository $workstationRepo)
    {
        $this->workstationRepository = $workstationRepo;
    }

    /**
     * Display a listing of the Workstation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workstationRepository->pushCriteria(new RequestCriteria($request));
        $workstations = $this->workstationRepository->all();

        return view('workstations.index')
            ->with('workstations', $workstations);
    }

    /**
     * Show the form for creating a new Workstation.
     *
     * @return Response
     */
    public function create()
    {
        return view('workstations.create');
    }

    /**
     * Store a newly created Workstation in storage.
     *
     * @param CreateWorkstationRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkstationRequest $request)
    {
        $input = $request->all();

        $workstation = $this->workstationRepository->create($input);

        Flash::success('Workstation saved successfully.');

        return redirect(route('workstations.index'));
    }

    /**
     * Display the specified Workstation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            Flash::error('Workstation not found');

            return redirect(route('workstations.index'));
        }

        return view('workstations.show')->with('workstation', $workstation);
    }

    /**
     * Show the form for editing the specified Workstation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            Flash::error('Workstation not found');

            return redirect(route('workstations.index'));
        }

        return view('workstations.edit')->with('workstation', $workstation);
    }

    /**
     * Update the specified Workstation in storage.
     *
     * @param  int              $id
     * @param UpdateWorkstationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkstationRequest $request)
    {
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            Flash::error('Workstation not found');

            return redirect(route('workstations.index'));
        }

        $workstation = $this->workstationRepository->update($request->all(), $id);

        Flash::success('Workstation updated successfully.');

        return redirect(route('workstations.index'));
    }

    /**
     * Remove the specified Workstation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workstation = $this->workstationRepository->findWithoutFail($id);

        if (empty($workstation)) {
            Flash::error('Workstation not found');

            return redirect(route('workstations.index'));
        }

        $this->workstationRepository->delete($id);

        Flash::success('Workstation deleted successfully.');

        return redirect(route('workstations.index'));
    }
}
