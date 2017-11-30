<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatehorarioMUcRequest;
use App\Http\Requests\UpdatehorarioMUcRequest;
use App\Repositories\horarioMUcRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class horarioMUcController extends AppBaseController
{
    /** @var  horarioMUcRepository */
    private $horarioMUcRepository;

    public function __construct(horarioMUcRepository $horarioMUcRepo)
    {
        $this->horarioMUcRepository = $horarioMUcRepo;
    }

    /**
     * Display a listing of the horarioMUc.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->horarioMUcRepository->pushCriteria(new RequestCriteria($request));
        $horarioMUcs = $this->horarioMUcRepository->all();

        return view('horario_m_ucs.index')
            ->with('horarioMUcs', $horarioMUcs);
    }

    /**
     * Show the form for creating a new horarioMUc.
     *
     * @return Response
     */
    public function create()
    {
        return view('horario_m_ucs.create');
    }

    /**
     * Store a newly created horarioMUc in storage.
     *
     * @param CreatehorarioMUcRequest $request
     *
     * @return Response
     */
    public function store(CreatehorarioMUcRequest $request)
    {
        $input = $request->all();

        $horarioMUc = $this->horarioMUcRepository->create($input);

        Flash::success('Horario M Uc saved successfully.');

        return redirect(route('horarioMUcs.index'));
    }

    /**
     * Display the specified horarioMUc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            Flash::error('Horario M Uc not found');

            return redirect(route('horarioMUcs.index'));
        }

        return view('horario_m_ucs.show')->with('horarioMUc', $horarioMUc);
    }

    /**
     * Show the form for editing the specified horarioMUc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            Flash::error('Horario M Uc not found');

            return redirect(route('horarioMUcs.index'));
        }

        return view('horario_m_ucs.edit')->with('horarioMUc', $horarioMUc);
    }

    /**
     * Update the specified horarioMUc in storage.
     *
     * @param  int              $id
     * @param UpdatehorarioMUcRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorarioMUcRequest $request)
    {
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            Flash::error('Horario M Uc not found');

            return redirect(route('horarioMUcs.index'));
        }

        $horarioMUc = $this->horarioMUcRepository->update($request->all(), $id);

        Flash::success('Horario M Uc updated successfully.');

        return redirect(route('horarioMUcs.index'));
    }

    /**
     * Remove the specified horarioMUc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            Flash::error('Horario M Uc not found');

            return redirect(route('horarioMUcs.index'));
        }

        $this->horarioMUcRepository->delete($id);

        Flash::success('Horario M Uc deleted successfully.');

        return redirect(route('horarioMUcs.index'));
    }
}
