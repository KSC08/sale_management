<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customer_type;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_types = DB::table('customer_types')->get();
        return view('customer_type.index',['customer_types' => $customer_types]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_types = DB::table('customer_types')->latest('id')->first();
        $customer_types = customer_type::all();
        return view('customer_type.create',compact('customer_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_types = new customer_type([
            'id' => $request->post('id'), 
            'name' => $request->post('name')             
        ]);
        $customer_types->save();
        return view('customer_type.index',['customer_types' => customer_type::All()]);
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
        return view('customer_type.edit',[
            'customer_types' => DB::table('customer_types')
            ->where('id','=',$id)->first()
            ]);

        // $customer_types = DB::table('customer_types')
        // ->where('id',$id)
        // ->get();
        // foreach($customer_types as $value)
        // return view('customer_type.edit',compact('value')); 
        

        // $customer_types = DB::table('customer_types')->where('id','=',$id)->first();
        // return  view('customer_type.index',['customer_types' => $customer_types]);
       
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
        $customer_types = CustomerType::find($id);
        $customer_types->name = $request->post('name');
        $customer_types->save();
        return view('customer_type.index',['customer_types' => CustomerType::All()]);

        // $update = [
        //     'id'        => $request->id,
        //     'name'      => $request->name
            
        // ];
        // dd($update);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */

    public function destroy($id)
    {
        DB::table('customer_types')->where('id',$id)->delete();
        return redirect()->back()->with('destroy','.');
    }
    
}
