<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\department;
use App\Models\sector;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departments_sec = DB::table('departments')
        ->join('sectors as sec','sec.id','=','departments.sector')
        ->select('departments.*',
                    'sec.fname as sec_fname',
                )
        ->get();
        return view('department.index',['departments' => $departments_sec]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector = sector::all();  //การดึงข้อมูลมาจาก db
        // // dd($dep);
        return view('department.create',['sector' => $sector]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new department([
            'fname' => $request->post('fname'),
            'sname' => $request->post('sname'),
            'sector' => $request->post('sec_fname')
        ]);
        // return $department;
        $department->save();
        return redirect()->action([DepartmentController::class, 'index']);
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

        $sector = sector::all();  //การดึงข้อมูลมาจาก db
        return view('department.edit',['sector' => $sector,'departments' => DB::table('departments')
        ->join('sectors','sectors.id','=','departments.sector')
        ->select('departments.*'
        ,'sectors.id as sec_id'
        ,'sectors.fname as sec_fname')
        ->where('departments.id','=',$id)->first()]);

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
        $department = department::find($id);
        $department->fname = $request->post('fname');
        $department->sname = $request->post('sname');
        $department->sector = $request->post('sec_fname');
        $department->save();
        return redirect()->action([DepartmentController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = department::find($id);
        $department->delete();
        return redirect()->action([DepartmentController::class, 'index']);

    }
}
