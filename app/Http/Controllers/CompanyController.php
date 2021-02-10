<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\company;
class CompanyController extends Controller
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
        return view('company.index', [
            'companies' => DB::table('companies')->get()
            ])->with('success', 'ลบข้มูลผู้ติดต่อแล้ว.');
    }

    //company search
    public function search(Request $request)
    {

        $companies = DB::table('companies')
        ->where('name', 'like', '%' . $request->get('name') . '%')
        ->get();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new company(['name' => $request->post('name')]);
        $company->save();
        return view('company.index', [
            'companies' => DB::table('companies')->get()
            ])->with('success', 'เพิ่มข้มูลบริษัทแล้ว');

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
        return view('company.edit', [
            'companies' => DB::table('companies')->where('id',$id)->first()
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
        $companies = company::find($request->post('id'));
        $companies->name = $request->post('name');
        $companies->save();
        return view('company.index', [
            'companies' => DB::table('companies')->get()
            ])->with('success', 'แก้ไขข้อมูลบริษัทแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = company::find($id);
        if($companies != null){
            $companies->delete();
            return view('company.index', [
                'companies' => DB::table('companies')->get()
                ])->with('success', 'ลบข้อมูลบริษัทแล้ว');
        }else{
            return view('company.index', [
                'companies' => DB::table('companies')->get()
                ])->with('alert', 'ไม่สามารถลบข็อมูลนี้ได้');
        }
        
    }
}
