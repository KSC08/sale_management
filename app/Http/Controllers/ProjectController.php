<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\project;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->role);
        // if(Auth::user()->role=='admin'){
        //     $project = DB::table('projects')->get();
        // }elseif(Auth::user()->role=='sector'){
        //     // $departments = DB::table('departments')
        //     // ->join('sectors','sectors.id','=','departments.sector')
        //     // ->join('users','users.sector','=','sectors.id')
        //     // ->where('users.id',Auth::user()->id)->get();
        //     $departments = DB::table('departments')->where('sector',Auth::user()->sector)->get();
        //     foreach($departments as $row){
        //         $id=$row->id;
        //     }
        //     $projects = DB::table('projects');
        //     if (is_array($id) || is_object($id))
        //     {
        //         $i=0;
        //         foreach ($id as $row)
        //         {
        //             if($i==0){
        //                 $projects->where('projects.id','=',$row[$i]);
        //                 $i=$i+1;
        //                 }else{
        //                 $projects->orWhere('projects.id','=',$row[$i]);
        //                 $i=$i+1;
        //                 dd($i);
        //                  }
        //         }
        //     }
        //     $projects->get();
        //     dd($projects);
        //     $project = DB::table('projects')->where('department',$departments)->get();
        // }elseif(Auth::user()->role=='department'){
        //     $project = DB::table('projects')->where('department',Auth::user()->department)->get();
        // }else{
        //     $project = DB::table('projects')->where('department',Auth::user()->department)->get();
        // }
        $user = DB::table('users')
        ->join('departments','departments.id','=','users.department')
        ->join('sectors','sectors.id','=','departments.sector')->where('users.id','=',Auth::user()->id)->get();
        // dd($user);

        if(Auth::user()->role =='sector'){
            // return Auth::user()->sector;
            $project = DB::table('projects')
                    ->join('departments','departments.id','=','projects.department')
                    ->where('departments.sector',Auth::user()->sector)
                    ->select('projects.*'
                    ,'departments.fname as department')
                    ->get();
        }elseif(Auth::user()->role =='admin'){
            $project = DB::table('projects')->get();
        }else{
            $project = DB::table('projects')
            ->join('departments','departments.id','=','projects.department')
            ->where('departments.sector',Auth::user()->sector)
            ->select('projects.*'
            ,'departments.fname as department')
            ->get();
        }
        return view('project.index',['project' => $project]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_status = DB::table('project_statuses')->get();
        $project_type = DB::table('project_types')->get();

        return view('project.create',['project_status' => $project_status,
                                      'project_type' => $project_type,
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        



        $project = new project(
            [
                'code' => $request->get('code'),
                'name' => $request->get('pro_name'),
                'pro_status' => $request->get('status'),
                'pro_type' => $request->get('type'),
                'detail' => $request->get('detail'),
                'department' => $request->get('department'),
                'created_by' => "admin",
                'update_by' => "admin"
            ]
            );
            // dd($project);
    
         $project->save();
         //dd(1);
         return redirect()->action([ProjectController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('project.edit', [
            'project' => DB::table('projects')
            ->join('project_statuses','project_statuses.id','=','projects.pro_status')
            ->join('project_types','project_types.id','=','projects.pro_type')
            ->where('projects.id',$id)
            ->select('projects.name'
            ,'projects.id'
            ,'projects.code'
            ,'projects.detail'
            ,'project_statuses.id as pro_status_id'
            ,'project_statuses.name as pro_status'
            ,'project_types.id as pro_status_id'
            ,'project_types.name as pro_type')
            ->first(),
            'project_status' => DB::table('project_statuses')->get(),
            'project_type' => DB::table('project_types')->get()
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
        $project = project::find($request->post('id'));
        $project->name = $request->post('pro_name');
        $project->pro_status = $request->post('status');
        $project->pro_type = $request->post('type');
        $project->detail = $request->post('detail');
        $project->save();
        return redirect()->action([ProjectController::class, 'index'])->with('success', 'แก้ไขข้อมูลแล้ว');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = project::find($id);
        if($delete != null){
            $delete->delete();
            return view('project.index', [
                'project' => DB::table('projects')->get()
                ])->with('success', 'ลบข้อมูลแล้ว');
        }else{
            return view('project.index', [
                'project' => DB::table('projects')->get()
                ])->with('alert', 'ไม่สามารถลบข้อมูลนี้ได้');
        }
    }
}
