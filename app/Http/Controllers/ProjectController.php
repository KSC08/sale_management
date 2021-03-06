<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\project;
use App\Models\project_detail;
use App\Models\document;
use Auth;
use Illuminate\Support\Facades\File;
class ProjectController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        // lol
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
        $customers = DB::table('customers')->get();
        return view('project.create', [
            'project_status' => $project_status,
            'project_type' => $project_type,
            'customer' => $customers,
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
                'budget' => $request->POST('budget'),
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
                'type_else'=> $request->post('type_else'),

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
                'created_by'=> Auth::user()->id,
                'update_by'=> Auth::user()->id,
            ]
        );
        // dd($project);
        if($project->pro_type=='4'){

        }
        $project_detail->save();
        //dd(1);
        $project_doc = new document();
        if ($request->hasfile('file1'))
        { //ตรวจเอกสาร
            $file = $request->file('file1');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '1'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
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
            $filename = time() . '.' . '2'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
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
            $filename = time() . '.' . '3'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
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
            $filename = time() . '.' . '4'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
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
            $filename = time() . '.' . '5'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file5 = $filename;
        }
        else
        {
            $project_doc->file5 = null;
        }
        if ($request->hasfile('file6'))
        { //ตรวจเอกสาร
            $file = $request->file('file6');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '6'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file6 = $filename;
        }
        else
        {
            $project_doc->file6 = null;
        }
        if ($request->hasfile('file7'))
        { //ตรวจเอกสาร
            $file = $request->file('file7');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '7'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file7 = $filename;
        }
        else
        {
            $project_doc->file7 = null;
        }
        if ($request->hasfile('file8'))
        { //ตรวจเอกสาร
            $file = $request->file('file8');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '8'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file8 = $filename;
        }
        else
        {
            $project_doc->file8 = null;
        }
        if ($request->hasfile('file9'))
        { //ตรวจเอกสาร
            $file = $request->file('file9');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '9'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file9 = $filename;
        }
        else
        {
            $project_doc->file9 = null;
        }
        if ($request->hasfile('file10'))
        { //ตรวจเอกสาร
            $file = $request->file('file10');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '10'.'.'.$extension;
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file10 = $filename;
        }
        else
        {
            $project_doc->file10 = null;
        }

        if ($request->hasfile('file11'))
        { //ตรวจเอกสาร
            $file = $request->file('file11');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '11'.'.'.$extension;
            // 20210210.11.namefile.pdf
            $file->move('pro_doc', $filename); //บันทึกเอกสารในโฟลเดอร์pro_doc
            $project_doc->file11 = $filename;
        }
        else
        {
            $project_doc->file11 = null;
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
        ->join('project_statuses', 'project_statuses.id', '=', 'projects.pro_status')
        ->join('project_types', 'project_types.id', '=', 'projects.pro_type')
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
        ,'documents.*',
        'project_statuses.id as pro_status_id',
        'project_statuses.name as pro_status_name',
        'project_types.id as pro_status_id',
        'project_types.name as pro_type_name')
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
                ->join('project_details', 'project_details.pro_id', '=', 'projects.id')
                ->join('project_statuses', 'project_statuses.id', '=', 'projects.pro_status')
                ->join('project_types', 'project_types.id', '=', 'projects.pro_type')
                ->join('customers', 'customers.id', '=', 'projects.customer')
                ->where('projects.id', $id)
                ->select('projects.*',
                'projects.id as pro_id',
                'project_details.*',
                'project_statuses.id as status_id',
                'project_statuses.name as status_name',
                'project_types.id as type_id',
                'project_types.name as type_name',
                'customers.id as cus_id',
                'customers.name as cus_name',)
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
    public function update(Request $request,$id)
    {
        $project = project::find($id);
        $project->code = $request->post('code');
        $project->name = $request->post('pro_name');
        $project->pro_status = $request->post('status');
        $project->pro_type = $request->post('type');
        $project->pro_type = $request->post('customer');
        $project->budget = $request->post('budget');
        $project->detail = $request->post('detail');
        $project->update_by = Auth::user()->id;
        $project->save();

        $project_detail = project_detail::where('pro_id','=',$id)->first();
        $project_detail->pmname = $request->post('pmname');
        $project_detail->pmlname = $request->post('pmlname');
        $project_detail->pmphone = $request->post('pmphone');
        $project_detail->customer = $request->post('customer');
        $project_detail->Payment = $request->post('Payment');

        $project_detail->operational_goals = $request->post('operational_goals');
        $project_detail->scope_detail1 = $request->post('scope_detail1');
        $project_detail->scope_detail2 = $request->post('scope_detail2');
        $project_detail->scope_detail3 = $request->post('scope_detail3');
        $project_detail->scope_detail4 = $request->post('scope_detail4');
        $project_detail->scope_detail5 = $request->post('scope_detail5');
        $project_detail->scope_detail6 = $request->post('scope_detail6');

        $project_detail->action_plan1 = $request->post('action_plan1');
        $project_detail->action_plan_date2 = $request->post('action_plan_date2');
        $project_detail->action_plan_date3 = $request->post('action_plan_date3');
        $project_detail->action_plan4 = $request->post('action_plan4');
        $project_detail->action_plan5 = $request->post('action_plan5');
        $project_detail->action_plan6 = $request->post('action_plan6');

        $project_detail->finance1 = $request->post('finance1');
        $project_detail->finance2 = $request->post('finance2');
        $project_detail->finance3 = $request->post('finance3');
        $project_detail->finance4 = $request->post('finance4');
        $project_detail->finance5 = $request->post('finance5');

        $project_detail->performance1 = $request->post('performance1');
        $project_detail->performance2 = $request->post('performance2');
        $project_detail->Risk = $request->post('Risk');
        $project_detail->update_by = Auth::user()->id;
        $project_detail->save();

        $document = document::where('pro_detail','=',$project_detail->id)->first ();
        if ($request->hasfile('file1'))
        { //ตรวจเอกสาร
            $file = $request->file('file1');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '1'.'.'. $extension;
            File::delete('pro_doc/' . $document->file1); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file1 = $pro_doc;
        }
        if ($request->hasfile('file2'))
        { //ตรวจเอกสาร
            $file = $request->file('file2');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '2'.'.'. $extension;
            File::delete('pro_doc/' . $document->file2); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file2 = $pro_doc;
        }
        if ($request->hasfile('file3'))
        { //ตรวจเอกสาร
            $file = $request->file('file3');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '3'.'.'. $extension;
            File::delete('pro_doc/' . $document->file3); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file3 = $pro_doc;
        }
        if ($request->hasfile('file4'))
        { //ตรวจเอกสาร
            $file = $request->file('file4');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '4'.'.'. $extension;
            File::delete('pro_doc/' . $document->file4); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file4 = $pro_doc;
        }
        if ($request->hasfile('file5'))
        { //ตรวจเอกสาร
            $file = $request->file('file5');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '5'.'.'. $extension;
            File::delete('pro_doc/' . $document->file5); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file5 = $pro_doc;
        }
        if ($request->hasfile('file6'))
        { //ตรวจเอกสาร
            $file = $request->file('file6');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '6'.'.'. $extension;
            File::delete('pro_doc/' . $document->file6); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file6 = $pro_doc;
        }
        if ($request->hasfile('file7'))
        { //ตรวจเอกสาร
            $file = $request->file('file7');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '7'.'.'. $extension;
            File::delete('pro_doc/' . $document->file7); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file7 = $pro_doc;
        }
        if ($request->hasfile('file8'))
        { //ตรวจเอกสาร
            $file = $request->file('file8');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '8'.'.'. $extension;
            File::delete('pro_doc/' . $document->file8); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file8 = $pro_doc;
        }
        if ($request->hasfile('file9'))
        { //ตรวจเอกสาร
            $file = $request->file('file9');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '9'.'.'. $extension;
            File::delete('pro_doc/' . $document->file9); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file9 = $pro_doc;
        }
        if ($request->hasfile('file10'))
        { //ตรวจเอกสาร
            $file = $request->file('file10');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '10'.'.'. $extension;
            File::delete('pro_doc/' . $document->file10); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file10 = $pro_doc;
        }
        if ($request->hasfile('file11'))
        { //ตรวจเอกสาร
            $file = $request->file('file11');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . '11'.'.'. $extension;
            File::delete('pro_doc/' . $document->file11); //ลบเอกสารในโฟลเดอร์pro_doc
            $file->move('pro_doc', $filename); //บันทึกเอกสารอันใหม่ในโฟลเดอร์pro_doc
            $pro_doc = $filename;
            $document->file11 = $pro_doc;
        }
        $document->save();
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
            $pro_detail = DB::table('project_details')->where('pro_id','=',$id)->first();
            if($pro_detail != null){
                $document = DB::table('documents')->where('pro_detail','=',$pro_detail->id)->first();
                if($document != null){
                    $delete_document = document::find($document->id);
                    File::delete('pro_doc/' . $delete_document->file1);
                    File::delete('pro_doc/' . $delete_document->file2);
                    File::delete('pro_doc/' . $delete_document->file3);
                    File::delete('pro_doc/' . $delete_document->file4);
                    File::delete('pro_doc/' . $delete_document->file5);
                    File::delete('pro_doc/' . $delete_document->file6);
                    File::delete('pro_doc/' . $delete_document->file7);
                    File::delete('pro_doc/' . $delete_document->file8);
                    File::delete('pro_doc/' . $delete_document->file9);
                    File::delete('pro_doc/' . $delete_document->file10);
                    File::delete('pro_doc/' . $delete_document->file11);
                    $delete_document->delete();
                }
                $delete_document = project_detail::find($pro_detail->id);
                $delete_document->delete();
            }
            
            $delete->delete();
            return redirect()->action([ProjectController::class, 'index'])->with('success', 'ลบข้อมูลแล้ว');
        } else {
            return redirect()->action([ProjectController::class, 'index'])->with('alert', 'ไม่สามารถลบข้อมูลนี้ได้');
        }
    }
}
