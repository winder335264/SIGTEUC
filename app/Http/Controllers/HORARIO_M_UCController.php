<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHORARIO_M_UCRequest;
use App\Http\Requests\UpdateHORARIO_M_UCRequest;
use App\Repositories\HORARIO_M_UCRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
class HORARIO_M_UCController extends AppBaseController
{
    /** @var  HORARIO_M_UCRepository */
    private $hORARIOMUCRepository;

    public function __construct(HORARIO_M_UCRepository $hORARIOMUCRepo)
    {
        $this->hORARIOMUCRepository = $hORARIOMUCRepo;
    }

    /**
     * Display a listing of the HORARIO_M_UC.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
        $hORARIOMUCS = db::table('HORARIO_M_UC')->paginate(15);

        return view('h_o_r_a_r_i_o__m__u_c_s.index')
            ->with('hORARIOMUCS', $hORARIOMUCS);
    }

    /**
     * Show the form for creating a new HORARIO_M_UC.
     *
     * @return Response
     */
    public function create()
    {
        return view('h_o_r_a_r_i_o__m__u_c_s.create');
    }

    /**
     * Store a newly created HORARIO_M_UC in storage.
     *
     * @param CreateHORARIO_M_UCRequest $request
     *
     * @return Response
     */
    public function store(CreateHORARIO_M_UCRequest $request)
    {
        $input = $request->all();

        $hORARIOMUC = db::table('HORARIO_M_UC')->insert(['idRuta'=>$request->input('idRuta'),'Horas'=>$request->input('Horas'),'bus'=>$request->input('bus')]);

        Flash::success('H O R A R I O  M  U C saved successfully.');

        return redirect(route('hORARIOMUCS.index'));
    }

    /**
     * Display the specified HORARIO_M_UC.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hORARIOMUC  = db::table('HORARIO_M_UC')->where('id',$id)->get();

        if (empty($hORARIOMUC)) {
            Flash::error('HORARIO M UC not found');

            return redirect(route('hORARIOMUCS.index'));
        }

        return view('h_o_r_a_r_i_o__m__u_c_s.show')->with('hORARIOMUC', $hORARIOMUC->all());
    }

    /**
     * Show the form for editing the specified HORARIO_M_UC.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hORARIOMUC  = db::table('HORARIO_M_UC')->where('id',$id)->get();

        if (empty($hORARIOMUC)) {
            Flash::error('H O R A R I O  M  U C not found');

            return redirect(route('hORARIOMUCS.index'));
        }

        return view('h_o_r_a_r_i_o__m__u_c_s.edit')->with('hORARIOMUC', $hORARIOMUC->all());
    }

    /**
     * Update the specified HORARIO_M_UC in storage.
     *
     * @param  int              $id
     * @param UpdateHORARIO_M_UCRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHORARIO_M_UCRequest $request)
    {
        $hORARIOMUC = $hORARIOMUCS = db::table('HORARIO_M_UC')->where('id',$id)->get();

        if (empty($hORARIOMUC)) {
            Flash::error('H O R A R I O  M  U C not found');

            return redirect(route('hORARIOMUCS.index'));
        }

        $hORARIOMUC = db::table('HORARIO_M_UC')->where('id',$id)->update(['idRuta'=>$request->input('idRuta'),'Horas'=>$request->input('Horas'),'bus'=>$request->input('bus')]);

        Flash::success('H O R A R I O  M  U C updated successfully.');

        return redirect(route('hORARIOMUCS.index'));
    }

    /**
     * Remove the specified HORARIO_M_UC from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hORARIOMUC =db::table('HORARIO_M_UC')->where('id',$id)->get();

        if (empty($hORARIOMUC)) {
            Flash::error('H O R A R I O  M  U C not found');

            return redirect(route('hORARIOMUCS.index'));
        }

        db::table('HORARIO_M_UC')->where('id',$id)->delete();

        Flash::success('H O R A R I O  M  U C deleted successfully.');

        return redirect(route('hORARIOMUCS.index'));
    }
}
