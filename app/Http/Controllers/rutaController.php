<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterutaRequest;
use App\Http\Requests\UpdaterutaRequest;
use App\Repositories\rutaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\AppBaseController;
class rutaController extends AppBaseController
{
    /** @var  rutaRepository */
    private $rutaRepository;

    public function __construct(rutaRepository $rutaRepo)
    {
        $this->rutaRepository = $rutaRepo;
    }

    /**
     * Display a listing of the ruta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rutaRepository->pushCriteria(new RequestCriteria($request));
        $rutas = $this->rutaRepository->all();

        return view('rutas.index')
            ->with('rutas', $rutas);
    }

    /**
     * Show the form for creating a new ruta.
     *
     * @return Response
     */
    public function create()
    {
        return view('rutas.create');
    }

    /**
     * Store a newly created ruta in storage.
     *
     * @param CreaterutaRequest $request
     *
     * @return Response
     */
    public function store(CreaterutaRequest $request)
    {
        $input = $request->all();

        $ruta = $this->rutaRepository->create($input);

        Flash::success('Ruta saved successfully.');

        return redirect(route('rutas.index'));
    }

    /**
     * Display the specified ruta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            Flash::error('Ruta not found');

            return redirect(route('rutas.index'));
        }

        return view('rutas.show')->with('ruta', $ruta);
    }

    /**
     * Show the form for editing the specified ruta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            Flash::error('Ruta not found');

            return redirect(route('rutas.index'));
        }

        return view('rutas.edit')->with('ruta', $ruta);
    }

    /**
     * Update the specified ruta in storage.
     *
     * @param  int              $id
     * @param UpdaterutaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterutaRequest $request)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            Flash::error('Ruta not found');

            return redirect(route('rutas.index'));
        }

        $ruta = $this->rutaRepository->update($request->all(), $id);

        Flash::success('Ruta updated successfully.');

        return redirect(route('rutas.index'));
    }

    /**
     * Remove the specified ruta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            Flash::error('Ruta not found');

            return redirect(route('rutas.index'));
        }

        $this->rutaRepository->delete($id);

        Flash::success('Ruta deleted successfully.');

        return redirect(route('rutas.index'));
    }
}
