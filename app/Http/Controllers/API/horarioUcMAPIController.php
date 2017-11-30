<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatehorarioUcMAPIRequest;
use App\Http\Requests\API\UpdatehorarioUcMAPIRequest;
use App\Models\horarioUcM;
use App\Repositories\horarioUcMRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class horarioUcMController
 * @package App\Http\Controllers\API
 */

class horarioUcMAPIController extends AppBaseController
{
    /** @var  horarioUcMRepository */
    private $horarioUcMRepository;

    public function __construct(horarioUcMRepository $horarioUcMRepo)
    {
        $this->horarioUcMRepository = $horarioUcMRepo;
    }

    /**
     * Display a listing of the horarioUcM.
     * GET|HEAD /horarioUcMs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->horarioUcMRepository->pushCriteria(new RequestCriteria($request));
        $this->horarioUcMRepository->pushCriteria(new LimitOffsetCriteria($request));
        $horarioUcMs = $this->horarioUcMRepository->all();

        return $this->sendResponse($horarioUcMs->toArray(), 'Horario Uc Ms retrieved successfully');
    }

    /**
     * Store a newly created horarioUcM in storage.
     * POST /horarioUcMs
     *
     * @param CreatehorarioUcMAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatehorarioUcMAPIRequest $request)
    {
        $input = $request->all();

        $horarioUcMs = $this->horarioUcMRepository->create($input);

        return $this->sendResponse($horarioUcMs->toArray(), 'Horario Uc M saved successfully');
    }

    /**
     * Display the specified horarioUcM.
     * GET|HEAD /horarioUcMs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var horarioUcM $horarioUcM */
        $horarioUcM = $this->horarioUcMRepository->findWithoutFail($id);

        if (empty($horarioUcM)) {
            return $this->sendError('Horario Uc M not found');
        }

        return $this->sendResponse($horarioUcM->toArray(), 'Horario Uc M retrieved successfully');
    }

    /**
     * Update the specified horarioUcM in storage.
     * PUT/PATCH /horarioUcMs/{id}
     *
     * @param  int $id
     * @param UpdatehorarioUcMAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorarioUcMAPIRequest $request)
    {
        $input = $request->all();

        /** @var horarioUcM $horarioUcM */
        $horarioUcM = $this->horarioUcMRepository->findWithoutFail($id);

        if (empty($horarioUcM)) {
            return $this->sendError('Horario Uc M not found');
        }

        $horarioUcM = $this->horarioUcMRepository->update($input, $id);

        return $this->sendResponse($horarioUcM->toArray(), 'horarioUcM updated successfully');
    }

    /**
     * Remove the specified horarioUcM from storage.
     * DELETE /horarioUcMs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var horarioUcM $horarioUcM */
        $horarioUcM = $this->horarioUcMRepository->findWithoutFail($id);

        if (empty($horarioUcM)) {
            return $this->sendError('Horario Uc M not found');
        }

        $horarioUcM->delete();

        return $this->sendResponse($id, 'Horario Uc M deleted successfully');
    }
}
