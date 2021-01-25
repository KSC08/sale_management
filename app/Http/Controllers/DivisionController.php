<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\division;
use App\Models\department;
use App\Http\Controllers\DivisionController;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions_dep = DB::table('divisions')
        ->join('departments as dep','dep.id','=','divisions.dep_id')
        ->select('divisions.*',
                    'dep.fullName as dep_fullName')
        ->get();
        return view('division.index',['divisions' => $divisions_dep]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = department::all();  //การดึงข้อมูลมาจาก db
        // dd($dep);
        return view('division.create',['dep' => $dep]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = new division([
            'fullName' => $request->post('fullName'),
            'shortName' => $request->post('shortName'),
            'dep_id' => $request->post('dep_fullName')
        ]);
        $division->save();
        return redirect()->action([DivisionController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = department::all();  //การดึงข้อมูลมาจาก db
        // // dd($dep);
        return view('division.edit',['dep' => $dep,'divisions' => DB::table('divisions')
        ->join('departments','departments.id','=','divisions.dep_id')
        ->select('divisions.fullName as div_fullName'
        ,'divisions.id as div_id'
        ,'divisions.shortName as div_shortName'
        ,'departments.id as dep_id'
        ,'departments.fullName as dep_fullName')
        ->where('divisions.id','=',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $division = division::find($id);
        $division->fullName = $request->post('fullName');
        $division->shortName = $request->post('shortName');
        $division->dep_id = $request->post('dep_fullName');
        $division->save();
        return redirect()->action([DivisionController::class, 'index']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = division::find($id);
        if($division){
            $division->delete();
        }
        return redirect()->action([DivisionController::class, 'index']);
    }
}
