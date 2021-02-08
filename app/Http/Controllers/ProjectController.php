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
        $user = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->join('sectors', 'sectors.id', '=', 'departments.sector')->where('users.id', '=', Auth::user()->id)->get();

        if (Auth::user()->role == 'sector') {
            // return Auth::user()->sector;
            $project = DB::table('projects')
                ->join('departments', 'departments.id', '=', 'projects.department')
                ->join('users as creater', 'creater.id', '=', 'projects.created_by')
                ->join('users as editor', 'editor.id', '=', 'projects.update_by')
                ->where('departments.sector', Auth::user()->sector)
                ->select(
                    'projects.*',
                    'departments.fname as department',
                    'creater.name as creater_name',
                    'editor.name as editor_name'
                )
                ->get();
        } elseif (Auth::user()->role == 'admin') {
            $project = DB::table('projects')
                ->join('departments', 'departments.id', '=', 'projects.department')
                ->join('users as creater', 'creater.id', '=', 'projects.created_by')
                ->join('users as editor', 'editor.id', '=', 'projects.update_by')
                ->select(
                    'projects.*',
                    'departments.fname as department',
                    'creater.name as creater_name',
                    'editor.name as editor_name'
                )
                ->get();
        } elseif (Auth::user()->role == 'user') {
            $project = DB::table('projects')
                ->join('departments', 'departments.id', '=', 'projects.department')
                ->join('users as creater', 'creater.id', '=', 'projects.created_by')
                ->join('users as editor', 'editor.id', '=', 'projects.update_by')
                ->where('projects.created_by', Auth::user()->id)
                ->select(
                    'projects.*',
                    'departments.fname as department',
                    'creater.name as creater_name',
                    'editor.name as editor_name'
                )
                ->get();
        } elseif (Auth::user()->role == 'department') {
            // return Auth::user()->sector;
            $project = DB::table('projects')
                ->join('departments', 'departments.id', '=', 'projects.department')
                ->join('users as creater', 'creater.id', '=', 'projects.created_by')
                ->join('users as editor', 'editor.id', '=', 'projects.update_by')
                ->where('departments.id', Auth::user()->department)
                ->select(
                    'projects.*',
                    'departments.fname as department',
                    'creater.name as creater_name',
                    'editor.name as editor_name'
                )
                ->get();
        }
        return view('project.index', ['project' => $project]);
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
        $customers = DB::table('customers')->where('created_by',Auth::user()->id)->get();
        return view('project.create', [
            'project_status' => $project_status,
            'project_type' => $project_type,
            'customers' => $customers,
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
        // dd($request->POST('customer'));
        $project = new project(
            [
                'code' => $request->POST('code'),
                'name' => $request->POST('pro_name'),
                'pro_status' => $request->POST('status'),
                'pro_type' => $request->POST('type'),
                'customer' => $request->POST('customer'),
                'detail' => $request->POST('detail'),
                'department' => $request->POST('department'),
                'created_by' => Auth::user()->id,
                'update_by' => Auth::user()->id
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
        return view('project.view', [
            'project' => DB::table('projects')
                ->join('project_statuses', 'project_statuses.id', '=', 'projects.pro_status')
                ->join('project_types', 'project_types.id', '=', 'projects.pro_type')
                ->join('customers', 'customers.id', '=', 'projects.customer')
                ->join('departments', 'departments.id', '=', 'projects.department')
                ->where('projects.id', $id)
                ->select(
                    'projects.*',
                    'project_statuses.id as pro_status_id',
                    'project_statuses.name as pro_status',
                    'project_types.id as pro_status_id',
                    'project_types.name as pro_type',
                    'customers.id as cus_id',
                    'customers.name as cus_name',
                    'departments.fname as dep_name',
                )
                ->first(),]);
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
                ->join('project_statuses', 'project_statuses.id', '=', 'projects.pro_status')
                ->join('project_types', 'project_types.id', '=', 'projects.pro_type')
                ->where('projects.id', $id)
                ->select(
                    'projects.name',
                    'projects.id',
                    'projects.code',
                    'projects.detail',
                    'project_statuses.id as pro_status_id',
                    'project_statuses.name as pro_status',
                    'project_types.id as pro_status_id',
                    'project_types.name as pro_type'
                )
                ->first(),
            'project_status' => DB::table('project_statuses')->get(),
            'project_type' => DB::table('project_types')->get(),
            'customers' => DB::table('customers')->where('created_by',Auth::user()->id)->get()

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
        $project->pro_type = $request->post('customer');
        $project->detail = $request->post('detail');
        $project->update_by = Auth::user()->id;
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
        if ($delete != null) {
            $delete->delete();
            return view('project.index', [
                'project' => DB::table('projects')->get()
            ])->with('success', 'ลบข้อมูลแล้ว');
        } else {
            return view('project.index', [
                'project' => DB::table('projects')->get()
            ])->with('alert', 'ไม่สามารถลบข้อมูลนี้ได้');
        }
    }
}
