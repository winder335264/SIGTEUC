<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHORARIO_M_UCAPIRequest;
use App\Http\Requests\API\UpdateHORARIO_M_UCAPIRequest;
use App\Models\HORARIO_M_UC;
use App\Repositories\HORARIO_M_UCRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HORARIO_M_UCController
 * @package App\Http\Controllers\API
 */

class HORARIO_M_UCAPIController extends AppBaseController
{
    /** @var  HORARIO_M_UCRepository */
    private $hORARIOMUCRepository;

    public function __construct(HORARIO_M_UCRepository $hORARIOMUCRepo)
    {
        $this->hORARIOMUCRepository = $hORARIOMUCRepo;
    }

    /**
     * Display a listing of the HORARIO_M_UC.
     * GET|HEAD /hORARIOMUCS
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hORARIOMUCRepository->pushCriteria(new RequestCriteria($request));
        $this->hORARIOMUCRepository->pushCriteria(new LimitOffsetCriteria($request));
        $hORARIOMUCS = $this->hORARIOMUCRepository->all();

        return $this->sendResponse($hORARIOMUCS->toArray(), 'H O R A R I O  M  U C S retrieved successfully');
    }

    /**
     * Store a newly created HORARIO_M_UC in storage.
     * POST /hORARIOMUCS
     *
     * @param CreateHORARIO_M_UCAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHORARIO_M_UCAPIRequest $request)
    {
        $input = $request->all();

        $hORARIOMUCS = $this->hORARIOMUCRepository->create($input);

        return $this->sendResponse($hORARIOMUCS->toArray(), 'H O R A R I O  M  U C saved successfully');
    }

    /**
     * Display the specified HORARIO_M_UC.
     * GET|HEAD /hORARIOMUCS/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HORARIO_M_UC $hORARIOMUC */
        $hORARIOMUC = $this->hORARIOMUCRepository->findWithoutFail($id);

        if (empty($hORARIOMUC)) {
            return $this->sendError('H O R A R I O  M  U C not found');
        }

        return $this->sendResponse($hORARIOMUC->toArray(), 'H O R A R I O  M  U C retrieved successfully');
    }

    /**
     * Update the specified HORARIO_M_UC in storage.
     * PUT/PATCH /hORARIOMUCS/{id}
     *
     * @param  int $id
     * @param UpdateHORARIO_M_UCAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHORARIO_M_UCAPIRequest $request)
    {
        $input = $request->all();

        /** @var HORARIO_M_UC $hORARIOMUC */
        $hORARIOMUC = $this->hORARIOMUCRepository->findWithoutFail($id);

        if (empty($hORARIOMUC)) {
            return $this->sendError('H O R A R I O  M  U C not found');
        }

        $hORARIOMUC = $this->hORARIOMUCRepository->update($input, $id);

        return $this->sendResponse($hORARIOMUC->toArray(), 'HORARIO_M_UC updated successfully');
    }

    /**
     * Remove the specified HORARIO_M_UC from storage.
     * DELETE /hORARIOMUCS/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HORARIO_M_UC $hORARIOMUC */
        $hORARIOMUC = $this->hORARIOMUCRepository->findWithoutFail($id);

        if (empty($hORARIOMUC)) {
            return $this->sendError('H O R A R I O  M  U C not found');
        }

        $hORARIOMUC->delete();

        return $this->sendResponse($id, 'H O R A R I O  M  U C deleted successfully');
    }
}
