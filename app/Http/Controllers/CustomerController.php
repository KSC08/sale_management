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
            ->join('companies','companies.id','=','customers.company_id')
            ->join('customer_types','customer_types.id','=','customers.customer_type')
            ->select(
                'customers.id as id',
                'customers.name as cus_name',
                'companies.name as com_name',
                'customer_types.name as cus_type_name'
            )->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create', ['companies' => DB::table('companies')->get(),
        'customer_types' => DB::table('customer_types')->get()]);
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
                'name' => $request->post('fname'),
                'company_id' => $request->post('company_id'),
                'customer_type' => $request->post('customer_type')
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
        $cus = DB::table('customers')
        ->join('companies as com','com.id','=','customers.company_id')
        ->join('customer_types as ct','ct.id','=','customers.customer_type')
        ->select(
            'customers.id as id',
            'customers.name as cus_name',
            'com.name as com_name',
            'com.id as com_id',
            'ct.id as cus_type_id',
            'ct.name as cus_type_name'
        )->where('customers.id',$id)->first();
        
        return view('customer.edit', [
            'customers' => DB::table('customers')
            ->join('companies as com','com.id','=','customers.company_id')
            ->join('customer_types as ct','ct.id','=','customers.customer_type')
            ->select(
                'customers.id as id',
                'customers.name as cus_name',
                'com.name as com_name',
                'com.id as com_id',
                'ct.id as cus_type_id',
                'ct.name as cus_type_name'
            )->where('customers.id',$id)->first(),
            'companies' => DB::table('companies')->get(),
            'customer_types' => DB::table('customer_types')->get()
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
        $customer = customer::find($id);
        // dd($request->post('name'));
        $customer->name = $request->post('name');
        $customer->company_id = $request->post('company_id');
        $customer->customer_type = $request->post('customer_type');
        if($customer->save()){
            return redirect()->action([CustomerController::class, 'index']);
        }else{
            dd("ไม่ได้");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        if($customer != null){
            $customer->delete();
            return redirect()->action([CustomerController::class, 'index']);
        }else{
            return redirect()->action([CustomerController::class, 'index']);
        }
    }
}
