<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateparadaRequest;
use App\Http\Requests\UpdateparadaRequest;
use App\Repositories\paradaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\AppBaseController;
use Mapper;
class paradaController extends AppBaseController
{
    /** @var  paradaRepository */
    private $paradaRepository;

    public function __construct(paradaRepository $paradaRepo)
    {
        $this->paradaRepository = $paradaRepo;
    }

    /**
     * Display a listing of the parada.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paradaRepository->pushCriteria(new RequestCriteria($request));
        $paradas = $this->paradaRepository->paginate(15);

        return view('paradas.index')
            ->with('paradas', $paradas);
    }

    /**
     * Show the form for creating a new parada.
     *
     * @return Response
     */
    public function create()
    {
         Mapper::map(10.2161604, -68.037388);
        return view('paradas.create');
    }

    /**
     * Store a newly created parada in storage.
     *
     * @param CreateparadaRequest $request
     *
     * @return Response
     */
    public function store(CreateparadaRequest $request)
    {
        $input = $request->all();

        $parada = $this->paradaRepository->create($input);

        Flash::success('Parada saved successfully.');

        return redirect(route('paradas.index'));
    }

    /**
     * Display the specified parada.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            Flash::error('Parada not found');

            return redirect(route('paradas.index'));
        }

        return view('paradas.show')->with('parada', $parada);
    }

    /**
     * Show the form for editing the specified parada.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            Flash::error('Parada not found');

            return redirect(route('paradas.index'));
        }

        return view('paradas.edit')->with('parada', $parada);
    }

    /**
     * Update the specified parada in storage.
     *
     * @param  int              $id
     * @param UpdateparadaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparadaRequest $request)
    {
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            Flash::error('Parada not found');

            return redirect(route('paradas.index'));
        }

        $parada = $this->paradaRepository->update($request->all(), $id);

        Flash::success('Parada updated successfully.');

        return redirect(route('paradas.index'));
    }

    /**
     * Remove the specified parada from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            Flash::error('Parada not found');

            return redirect(route('paradas.index'));
        }

        $this->paradaRepository->delete($id);

        Flash::success('Parada deleted successfully.');

        return redirect(route('paradas.index'));
    }
}
