<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index', [
            'customers' => DB::table('customers')
            ->join('companies','companies.id','=','customers.id')
            ->select(
                'customers.id as id',
                'customers.fname as cus_name',
                'companies.name as com_name'
                
            )->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create', ['companies' => DB::table('companies')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new customer([
                'fname' => $request->post('fname'),
                'company_id' => $request->post('company_id')
            ]);
        $customer->save();
        return redirect()->action([CustomerController::class, 'index']);
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
        return view('customer.edit', [
            'customers' => DB::table('customers')->join('companies','companies.id','=','customers.id')->select(
                'customers.id as id',
                'customers.fname as cus_name',
                'companies.name as com_name',
                'companies.id as com_id'
                
            )->where('customers.id',$id)->first(),
            'companies' => DB::table('companies')->get()
        ]);
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
        $customer = customer::find($request->post('id'));
        $customer->name = $request->post('fname');
        $customer->company_id = $request->post('company_id');
        $customer->save();
        return view('customer.index', [
            'customers' => DB::table('customers')
            ->join('companies','companies.id','=','customers.id')->select(
                'customers.id as id',
                'companies.name as com_name',
                'customers.fname as cus_name'
            )->get()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
