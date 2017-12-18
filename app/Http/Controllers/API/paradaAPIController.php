<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateparadaAPIRequest;
use App\Http\Requests\API\UpdateparadaAPIRequest;
use App\Models\parada;
use App\Repositories\paradaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

/**
 * Class paradaController
 * @package App\Http\Controllers\API
 */

class paradaAPIController extends AppBaseController
{
    /** @var  paradaRepository */
    private $paradaRepository;

    public function __construct(paradaRepository $paradaRepo)
    {
        $this->paradaRepository = $paradaRepo;
    }

    /**
     * Display a listing of the parada.
     * GET|HEAD /paradas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paradaRepository->pushCriteria(new RequestCriteria($request));
        $this->paradaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paradas = $this->paradaRepository->all();

        return $this->sendResponse($paradas->toArray(), 'Paradas retrieved successfully');
    }

    /**
     * Store a newly created parada in storage.
     * POST /paradas
     *
     * @param CreateparadaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateparadaAPIRequest $request)
    {
        $input = $request->all();

        $paradas = $this->paradaRepository->create($input);

        return $this->sendResponse($paradas->toArray(), 'Parada saved successfully');
    }

    /**
     * Display the specified parada.
     * GET|HEAD /paradas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var parada $parada */
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            return $this->sendError('Parada not found');
        }

        return $this->sendResponse($parada->toArray(), 'Parada retrieved successfully');
    }

    /**
     * Update the specified parada in storage.
     * PUT/PATCH /paradas/{id}
     *
     * @param  int $id
     * @param UpdateparadaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparadaAPIRequest $request)
    {
        $input = $request->all();

        /** @var parada $parada */
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            return $this->sendError('Parada not found');
        }

        $parada = $this->paradaRepository->update($input, $id);

        return $this->sendResponse($parada->toArray(), 'parada updated successfully');
    }

    /**
     * Remove the specified parada from storage.
     * DELETE /paradas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var parada $parada */
        $parada = $this->paradaRepository->findWithoutFail($id);

        if (empty($parada)) {
            return $this->sendError('Parada not found');
        }

        $parada->delete();

        return $this->sendResponse($id, 'Parada deleted successfully');
    }
    public function getParadasByRutaId($id){
        $result=DB::table('PARADA')->where('idRuta',$id)->get();
        if(sizeof($result)>0){
            return $this->sendResponse($result,"paradas obtenidas");
        }else{
            return $this->sendError("paradas obtenidas no encontradas");
        }//end if-else
    }
    
    public function getHorarios($idruta){
        $result=DB::table('HORARIO_UC_M')->where('idRuta',$idruta)->get();
        $result2=DB::table('HORARIO_M_UC')->where('idRuta',$idruta)->get();
        return $this->sendResponse(["h_uc_m"=>$result,"h_m_uc"=>$result2],"horarios obtenidos");
    }
    public function getinforutascercanas(){
        $result=DB::table('PARADA')->join('RUTA','PARADA.idRUta','=','RUTA.id')->select('PARADA.latitud','PARADA.longitud','PARADA.nombre as nombre','RUTA.nombre as idRuta')->get();
        return $this->sendResponse($result,'200');
    }
}
