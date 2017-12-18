<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatehorarioMUcAPIRequest;
use App\Http\Requests\API\UpdatehorarioMUcAPIRequest;
use App\Models\horarioMUc;
use App\Repositories\horarioMUcRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class horarioMUcController
 * @package App\Http\Controllers\API
 */

class horarioMUcAPIController extends AppBaseController
{
    /** @var  horarioMUcRepository */
    private $horarioMUcRepository;

    public function __construct(horarioMUcRepository $horarioMUcRepo)
    {
        $this->horarioMUcRepository = $horarioMUcRepo;
    }

    /**
     * Display a listing of the horarioMUc.
     * GET|HEAD /horarioMUcs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->horarioMUcRepository->pushCriteria(new RequestCriteria($request));
        $this->horarioMUcRepository->pushCriteria(new LimitOffsetCriteria($request));
        $horarioMUcs = $this->horarioMUcRepository->all();

        return $this->sendResponse($horarioMUcs->toArray(), 'Horario M Ucs retrieved successfully');
    }

    /**
     * Store a newly created horarioMUc in storage.
     * POST /horarioMUcs
     *
     * @param CreatehorarioMUcAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatehorarioMUcAPIRequest $request)
    {
        $input = $request->all();

        $horarioMUcs = $this->horarioMUcRepository->create($input);

        return $this->sendResponse($horarioMUcs->toArray(), 'Horario M Uc saved successfully');
    }

    /**
     * Display the specified horarioMUc.
     * GET|HEAD /horarioMUcs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var horarioMUc $horarioMUc */
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            return $this->sendError('Horario M Uc not found');
        }

        return $this->sendResponse($horarioMUc->toArray(), 'Horario M Uc retrieved successfully');
    }

    /**
     * Update the specified horarioMUc in storage.
     * PUT/PATCH /horarioMUcs/{id}
     *
     * @param  int $id
     * @param UpdatehorarioMUcAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorarioMUcAPIRequest $request)
    {
        $input = $request->all();

        /** @var horarioMUc $horarioMUc */
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            return $this->sendError('Horario M Uc not found');
        }

        $horarioMUc = $this->horarioMUcRepository->update($input, $id);

        return $this->sendResponse($horarioMUc->toArray(), 'horarioMUc updated successfully');
    }

    /**
     * Remove the specified horarioMUc from storage.
     * DELETE /horarioMUcs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var horarioMUc $horarioMUc */
        $horarioMUc = $this->horarioMUcRepository->findWithoutFail($id);

        if (empty($horarioMUc)) {
            return $this->sendError('Horario M Uc not found');
        }

        $horarioMUc->delete();

        return $this->sendResponse($id, 'Horario M Uc deleted successfully');
    }
}
