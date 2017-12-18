<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterutaAPIRequest;
use App\Http\Requests\API\UpdaterutaAPIRequest;
use App\Models\ruta;
use App\Repositories\rutaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class rutaController
 * @package App\Http\Controllers\API
 */

class rutaAPIController extends AppBaseController
{
    /** @var  rutaRepository */
    private $rutaRepository;

    public function __construct(rutaRepository $rutaRepo)
    {
        $this->rutaRepository = $rutaRepo;
    }

    /**
     * Display a listing of the ruta.
     * GET|HEAD /rutas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rutaRepository->pushCriteria(new RequestCriteria($request));
        $this->rutaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rutas = $this->rutaRepository->all();

        return $this->sendResponse($rutas->toArray(), 'Rutas retrieved successfully');
    }

    /**
     * Store a newly created ruta in storage.
     * POST /rutas
     *
     * @param CreaterutaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreaterutaAPIRequest $request)
    {
        $input = $request->all();

        $rutas = $this->rutaRepository->create($input);

        return $this->sendResponse($rutas->toArray(), 'Ruta saved successfully');
    }

    /**
     * Display the specified ruta.
     * GET|HEAD /rutas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ruta $ruta */
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            return $this->sendError('Ruta not found');
        }

        return $this->sendResponse($ruta->toArray(), 'Ruta retrieved successfully');
    }

    /**
     * Update the specified ruta in storage.
     * PUT/PATCH /rutas/{id}
     *
     * @param  int $id
     * @param UpdaterutaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterutaAPIRequest $request)
    {
        $input = $request->all();

        /** @var ruta $ruta */
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            return $this->sendError('Ruta not found');
        }

        $ruta = $this->rutaRepository->update($input, $id);

        return $this->sendResponse($ruta->toArray(), 'ruta updated successfully');
    }

    /**
     * Remove the specified ruta from storage.
     * DELETE /rutas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ruta $ruta */
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            return $this->sendError('Ruta not found');
        }

        $ruta->delete();

        return $this->sendResponse($id, 'Ruta deleted successfully');
    }
}
