<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateparadasUcRequest;
use App\Http\Requests\UpdateparadasUcRequest;
use App\Repositories\paradasUcRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class paradasUcController extends AppBaseController
{
    /** @var  paradasUcRepository */
    private $paradasUcRepository;

    public function __construct(paradasUcRepository $paradasUcRepo)
    {
        $this->paradasUcRepository = $paradasUcRepo;
    }

    /**
     * Display a listing of the paradasUc.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paradasUcRepository->pushCriteria(new RequestCriteria($request));
        $paradasUcs = $this->paradasUcRepository->all();

        return view('paradas_ucs.index')
            ->with('paradasUcs', $paradasUcs);
    }

    /**
     * Show the form for creating a new paradasUc.
     *
     * @return Response
     */
    public function create()
    {
        return view('paradas_ucs.create');
    }

    /**
     * Store a newly created paradasUc in storage.
     *
     * @param CreateparadasUcRequest $request
     *
     * @return Response
     */
    public function store(CreateparadasUcRequest $request)
    {
        $input = $request->all();

        $paradasUc = $this->paradasUcRepository->create($input);

        Flash::success('Paradas Uc saved successfully.');

        return redirect(route('paradasUcs.index'));
    }

    /**
     * Display the specified paradasUc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            Flash::error('Paradas Uc not found');

            return redirect(route('paradasUcs.index'));
        }

        return view('paradas_ucs.show')->with('paradasUc', $paradasUc);
    }

    /**
     * Show the form for editing the specified paradasUc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            Flash::error('Paradas Uc not found');

            return redirect(route('paradasUcs.index'));
        }

        return view('paradas_ucs.edit')->with('paradasUc', $paradasUc);
    }

    /**
     * Update the specified paradasUc in storage.
     *
     * @param  int              $id
     * @param UpdateparadasUcRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparadasUcRequest $request)
    {
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            Flash::error('Paradas Uc not found');

            return redirect(route('paradasUcs.index'));
        }

        $paradasUc = $this->paradasUcRepository->update($request->all(), $id);

        Flash::success('Paradas Uc updated successfully.');

        return redirect(route('paradasUcs.index'));
    }

    /**
     * Remove the specified paradasUc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            Flash::error('Paradas Uc not found');

            return redirect(route('paradasUcs.index'));
        }

        $this->paradasUcRepository->delete($id);

        Flash::success('Paradas Uc deleted successfully.');

        return redirect(route('paradasUcs.index'));
    }
}
