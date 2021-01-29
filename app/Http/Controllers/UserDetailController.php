<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\user_detail;
use App\Models\customer;
use App\Models\division;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_details = DB::table('user_details')
        ->join('users','users.id','=','user_id')
        ->join('customers','customers.id','=','customer')
        ->join('divisions','divisions.id','=','div_id')
                ->select('user_details.*',
                         'users.name as user_name',
                         'customers.name as cus_name',
                         'divisions.fname as div_name',
                         )->get();
        return view('user_detail.index',['user_details' => $user_details]);
    }

    // $user_details = DB::table('user_details')->join('users','users.id','=','user_id')->join('customers.id','users.id','=','user_id')
    // return view('user_detail.index',['user_details' => $user_details]);

    // //
    // $users = DB::table('users')->join('divisions','divisions.id','=','div_id')
    //     ->select('users.id as user_id',
    //                 'users.name as user_name',
    //                 'users.email',
    //                 'users.password',
    //                 'divisions.name as division')->get();
    //     return view('user.index',['users' => $users]);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = division::All();
        $customer = customer::All();
        $User = User::All();
        return view('user_detail.create',['division' => $division
        ,'customers'=>$customer
        ,'User'=>$User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_details = new user_detail([
            'user_id' => $request->post('user_id'),
            'customer' => $request->post('customer'),
            'div_id' => $request->post('div_id'),
            'phone_number' => $request->post('phone_number')                
        ]);
        $user_details->save();
        return redirect()->action([UserDetailController::class, 'index']);
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
        $user_details = DB::table('user_details')
        ->join('users','users.id','=','user_id')
        ->join('customers','customers.id','=','customer')
        ->join('divisions','divisions.id','=','div_id')
        ->where('user_details.id','=',$id)
        ->select('user_details.phone_number',
        'user_details.id as id',
        'users.id as user_id',
        'users.name as user_name',
        'customers.id as customer',
        'customers.name as cus_name',
        'divisions.id as div_id',
        'divisions.fname as div_name')->first();
        // return 0;
        return view('user_detail.edit',[
            'user_details' => $user_details,
            'User' => User::All(),
            'customers' => customer::All(),
            'division' => division::All()])
        ; 



        // return view('user_detail.edit',[
        //     'user_details' => DB::table('user_details')
        //     ->where('id','=',$id)->first()
        //     ]);
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
        
        $user_details = user_detail::find($id);
        $user_details->user_id = $request->post('user_id');
        $user_details->customer = $request->post('customer');
        $user_details->div_id = $request->post('div_id');
        $user_details->phone_number = $request->post('phone_number');
        $user_details->save();

        return redirect()->action([UserDetailController::class, 'index']);
    }

    // //
        // 'id',
        // 'user_id',
        // 'customer',
        // 'div_id',
        // 'phone_number'

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user_details')->where('id',$id)->delete();
        return redirect()->action([UserDetailController::class, 'index']);
    }
}
