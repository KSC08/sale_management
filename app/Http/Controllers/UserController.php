<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = DB::table('users')->get();
        return view('user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = Division::All();
        return view('user.create',['division' => $division]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'phone_number' => $request->post('phone_number'),


        ]);
        
        $users->save();
        return view('user.index',['users' => User::All()]);

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
        $users = DB::table('users')->join('divisions','divisions.id','=','div_id')
        ->where('users.id','=',$id)
        ->select('users.*',
        'divisions.id as div_id',
                    'divisions.name as division')->first();

        return view('user.edit',['user' => $users,'division' => division::All()]); 

        // return view('user.edit',[
        //     'users' => DB::table('users')
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
        // $update = [
        //     'id'        => $request->id,
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'password'  => $request->password,
        //     'division'  => $request->division
        // ];
        // dd($update);


        $users = User::find($id);
        $users->name = $request->post('name');
        $users->email = $request->post('email');
        // $users->password = $request->post('password');
        $users->div_id = $request->post('div_id');
        $users->phone_number = $request->post('phone_number');
        $users->save();
        return redirect()->action([UserController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('destroy','.');

    }
}
