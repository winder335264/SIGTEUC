<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateparadasUcAPIRequest;
use App\Http\Requests\API\UpdateparadasUcAPIRequest;
use App\Models\paradasUc;
use App\Repositories\paradasUcRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class paradasUcController
 * @package App\Http\Controllers\API
 */

class paradasUcAPIController extends AppBaseController
{
    /** @var  paradasUcRepository */
    private $paradasUcRepository;

    public function __construct(paradasUcRepository $paradasUcRepo)
    {
        $this->paradasUcRepository = $paradasUcRepo;
    }

    /**
     * Display a listing of the paradasUc.
     * GET|HEAD /paradasUcs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paradasUcRepository->pushCriteria(new RequestCriteria($request));
        $this->paradasUcRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paradasUcs = $this->paradasUcRepository->all();

        return $this->sendResponse($paradasUcs->toArray(), 'Paradas Ucs retrieved successfully');
    }

    /**
     * Store a newly created paradasUc in storage.
     * POST /paradasUcs
     *
     * @param CreateparadasUcAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateparadasUcAPIRequest $request)
    {
        $input = $request->all();

        $paradasUcs = $this->paradasUcRepository->create($input);

        return $this->sendResponse($paradasUcs->toArray(), 'Paradas Uc saved successfully');
    }

    /**
     * Display the specified paradasUc.
     * GET|HEAD /paradasUcs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var paradasUc $paradasUc */
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            return $this->sendError('Paradas Uc not found');
        }

        return $this->sendResponse($paradasUc->toArray(), 'Paradas Uc retrieved successfully');
    }

    /**
     * Update the specified paradasUc in storage.
     * PUT/PATCH /paradasUcs/{id}
     *
     * @param  int $id
     * @param UpdateparadasUcAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparadasUcAPIRequest $request)
    {
        $input = $request->all();

        /** @var paradasUc $paradasUc */
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            return $this->sendError('Paradas Uc not found');
        }

        $paradasUc = $this->paradasUcRepository->update($input, $id);

        return $this->sendResponse($paradasUc->toArray(), 'paradasUc updated successfully');
    }

    /**
     * Remove the specified paradasUc from storage.
     * DELETE /paradasUcs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var paradasUc $paradasUc */
        $paradasUc = $this->paradasUcRepository->findWithoutFail($id);

        if (empty($paradasUc)) {
            return $this->sendError('Paradas Uc not found');
        }

        $paradasUc->delete();

        return $this->sendResponse($id, 'Paradas Uc deleted successfully');
    }
}
