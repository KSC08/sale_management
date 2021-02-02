<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\project_type;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_type = DB::table('project_types')->get();
        
        return view('project_type.index',['project_type' => $project_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $project_type = new project_type(
        [
            'name' => $request->get('name')
        ]
        );

     $project_type->save();
     //dd(1);
     return redirect()->action([ProjectTypeController::class, 'index']);
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
        return view('project_type.edit', [
            'project_type' => DB::table('project_types')->where('id',$id)->first()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $project_type = project_type::find($request->post('id'));
        $project_type->name = $request->post('name');
        $project_type->save();
        return view('project_type.index', [
            'project_type' => DB::table('project_types')->get()
            ])->with('success', 'แก้ไขข้อมูลแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = project_type::find($id);
        if($delete != null){
            $delete->delete();
            return view('project_type.index', [
                'project_type' => DB::table('project_types')->get()
                ])->with('success', 'ลบข้อมูลแล้ว');
        }else{
            return view('project_type.index', [
                'project_type' => DB::table('project_types')->get()
                ])->with('alert', 'ไม่สามารถลบข้อมูลนี้ได้');
        }
    }
}
