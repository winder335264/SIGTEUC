<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatehorarioUcMRequest;
use App\Http\Requests\UpdatehorarioUcMRequest;
use App\Repositories\horarioUcMRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
class horarioUcMController extends AppBaseController
{
    /** @var  horarioUcMRepository */
    private $horarioUcMRepository;

    public function __construct(horarioUcMRepository $horarioUcMRepo)
    {
        $this->horarioUcMRepository = $horarioUcMRepo;
    }

    /**
     * Display a listing of the horarioUcM.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->horarioUcMRepository->pushCriteria(new RequestCriteria($request));
        $horarioUcMs = $this->horarioUcMRepository->paginate(15);

        return view('horario_uc_ms.index')
            ->with('horarioUcMs', $horarioUcMs);
    }

    /**
     * Show the form for creating a new horarioUcM.
     *
     * @return Response
     */
    public function create()
    {
        return view('horario_uc_ms.create');
    }

    /**
     * Store a newly created horarioUcM in storage.
     *
     * @param CreatehorarioUcMRequest $request
     *
     * @return Response
     */
    public function store(CreatehorarioUcMRequest $request)
    {
        $input = $request->all();

        $horarioUcM = db::table('HORARIO_UC_M')->insert(['idRuta'=>$request->input('idRuta'),'Horas'=>$request->input('Horas'),'bus'=>$request->input('bus')]);

        Flash::success('Horario Uc M saved successfully.');

        return redirect(route('horarioUcMs.index'));
    }

    /**
     * Display the specified horarioUcM.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $horarioUcM = db::table('HORARIO_UC_M')->where('id',$id)->get();

        if (empty($horarioUcM)) {
            Flash::error('Horario Uc M not found');

            return redirect(route('horarioUcMs.index'));
        }

        return view('horario_uc_ms.show')->with('horarioUcM', $horarioUcM->all());
    }

    /**
     * Show the form for editing the specified horarioUcM.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $horarioUcM = db::table('HORARIO_UC_M')->where('id',$id)->get();

        if (empty($horarioUcM)) {
            Flash::error('Horario Uc M not found');

            return redirect(route('horarioUcMs.index'));
        }

        return view('horario_uc_ms.edit')->with('horarioUcM', $horarioUcM->all());
    }

    /**
     * Update the specified horarioUcM in storage.
     *
     * @param  int              $id
     * @param UpdatehorarioUcMRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorarioUcMRequest $request)
    {
        $horarioUcM = db::table('HORARIO_UC_M')->where('id',$id)->get();

        if (empty($horarioUcM)) {
            Flash::error('Horario Uc M not found');

            return redirect(route('horarioUcMs.index'));
        }

         db::table('HORARIO_UC_M')->where('id',$id)->update(['Horas'=>$request->input('Horas'),'bus'=>$request->input('bus')]);

        Flash::success('Horario Uc M updated successfully.');

        return redirect(route('horarioUcMs.index'));
    }

    /**
     * Remove the specified horarioUcM from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $horarioUcM = db::table('HORARIO_UC_M')->where('id',$id)->get();

        if (empty($horarioUcM)) {
            Flash::error('Horario Uc M not found');

            return redirect(route('horarioUcMs.index'));
        }

       $horarioUcM = db::table('HORARIO_UC_M')->where('id',$id)->delete();

        Flash::success('Horario Uc M deleted successfully.');

        return redirect(route('horarioUcMs.index'));
    }
}
