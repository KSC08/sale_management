<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\project;
use App\Models\project_detail;
use App\Models\document;
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
        // dd($user);

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
        $project->code='PD1234';


        $project->save();

        $project_detail = new project_detail(
            [
                'pro_id'=> $project->id,
                'name'=> $request->post('name'),
                'pmname'=> $request->post('pmname'),
                'pmlname'=> $request->post('pmlname'),
                'pmphone'=> $request->post('pmphone'),
                'customer'=> $request->post('customer'),
                'Payment'=> $request->post('Payment'),

                'operational_goals'=> $request->post('operational_goals'),
                'scope_detail1'=> $request->post('scope_detail1'),
                'scope_detail2'=> $request->post('scope_detail2'),
                'scope_detail3'=> $request->post('scope_detail3'),
                'scope_detail4'=> $request->post('scope_detail4'),
                'scope_detail5'=> $request->post('scope_detail5'),
                'scope_detail6'=> $request->post('scope_detail6'),

                'action_plan1'=> $request->post('action_plan1'),
                'action_plan_date2'=> $request->post('action_plan_date2'),
                'action_plan_date3'=> $request->post('action_plan_date3'),
                'action_plan4'=> $request->post('action_plan4'),
                'action_plan5'=> $request->post('action_plan5'),
                'action_plan6'=> $request->post('action_plan6'),

                'finance1'=> $request->post('finance1'),
                'finance2'=> $request->post('finance2'),
                'finance3'=> $request->post('finance3'),
                'finance4'=> $request->post('finance4'),
                'finance5'=> $request->post('finance5'),

                'performance1'=> $request->post('performance1'),
                'performance2'=> $request->post('performance2'),
                'Risk'=> $request->post('Risk'),
                'created_by'=> 'admin',
                'update_by'=> 'admin',
            ]
        );
        // dd($project);

        $project_detail->save();
        //dd(1);
        $project_doc = new document();
        if ($request->hasfile('file1'))
        { //ตรวจเอกสาร
            $file = $request->file('file1');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '1'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์vis_doc
            $project_doc->file1 = $filename;
        }
        else
        {
            $project_doc->file1 = null;
        }
        if ($request->hasfile('file2'))
        { //ตรวจเอกสาร
            $file = $request->file('file2');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '2'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์vis_doc
            $project_doc->file2 = $filename;
        }
        else
        {
            $project_doc->file2 = null;
        }
        if ($request->hasfile('file3'))
        { //ตรวจเอกสาร
            $file = $request->file('file3');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '3'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์vis_doc
            $project_doc->file3 = $filename;
        }
        else
        {
            $project_doc->file3 = null;
        }
        if ($request->hasfile('file4'))
        { //ตรวจเอกสาร
            $file = $request->file('file4');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '4'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์vis_doc
            $project_doc->file4 = $filename;
        }
        else
        {
            $project_doc->file4 = null;
        }
        if ($request->hasfile('file5'))
        { //ตรวจเอกสาร
            $file = $request->file('file5');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '5'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์vis_doc
            $project_doc->file5 = $filename;
        }
        else
        {
            $project_doc->file5 = null;
        }
        $project_doc->pro_detail = $project_detail->id;
        $project_doc->save();
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
        $project = DB::table('projects')
        ->join('project_details','project_details.pro_id','=','projects.id')
        ->join('documents','documents.pro_detail','=','project_details.id')
        ->where('projects.id',$id)
        ->select('projects.code as code'
        ,'projects.name as name'
        ,'projects.pro_status'
        ,'projects.pro_type'
        ,'projects.detail'
        ,'projects.department'
        ,'projects.created_by'
        ,'projects.update_by'
        ,'project_details.*'
        ,'documents.*')
        ->first();
        return view('project.detail', ['project' => $project]);
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
