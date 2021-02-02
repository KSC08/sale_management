<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\project_status;
class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_status = DB::table('project_statuses')->get();
        
        return view('project_status.index',['project_status' => $project_status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $project_status = new project_status(
            [
                'name' => $request->get('name')
            ]
            );
    
         $project_status->save();
         //dd(1);
         return redirect()->action([ProjectStatusController::class, 'index']);
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
        return view('project_status.edit', [
            'project_status' => DB::table('project_statuses')->where('id',$id)->first()
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
        $project_status = project_status::find($request->post('id'));
        $project_status->name = $request->post('name');
        $project_status->save();
        return view('project_status.index', [
            'project_status' => DB::table('project_statuses')->get()
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
        $delete = project_status::find($id);
        if($delete != null){
            $delete->delete();
            return view('project_status.index', [
                'project_status' => DB::table('project_statuses')->get()
                ])->with('success', 'ลบข้อมูลแล้ว');
        }else{
            return view('project_status.index', [
                'project_status' => DB::table('project_statuses')->get()
                ])->with('alert', 'ไม่สามารถลบข้อมูลนี้ได้');
        }
    }
}
