<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\department;
use App\Models\sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if($id==1){
            $users = DB::table('users')
            ->join('sectors', 'sectors.id', '=', 'users.sector')
            ->where('role','=','sector')
            ->select('users.*'
            ,'sectors.fname as division')
            ->get();
        }elseif($id==2){
            $users = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->where('role','=','department')
            ->select('users.*'
            ,'departments.fname as division')
            ->get();
        }elseif($id==3){
            $users = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->where('role','=','user')
            ->select('users.*'
            ,'departments.fname as division')
            ->get();
        }
        
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
        $user = User::find($id);
        if($user->role=='sector'){
            $user_edit = DB::table('users')
            ->join('sectors','sectors.id','=','users.sector')
            ->where('users.id',$id)
            ->select('users.*'
            ,'sectors.fname as sector_name')->first();
            return view('user.edit',['user' => $user_edit,'division' => sector::All()]); 
        }else{
            $user_edit = DB::table('users')
            ->join('departments','departments.id','=','users.department')
            ->where('users.id',$id)
            ->select('users.*','departments.fname as dep_name')->first();
            return view('user.edit',['user' => $user_edit,'division' => department::All()]); 
        }
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
        if($users->role=="sector"){
            $users->sector = $request->post('div_id');
        }else{
            $users->department = $request->post('div_id');
        }
        $users->save();
        if($users->role=='sector'){
            $users = DB::table('users')
            ->join('sectors', 'sectors.id', '=', 'users.sector')
            ->where('role','=','sector')
            ->select('users.*'
            ,'sectors.fname as division')
            ->get();
        }elseif($users->role=='department'){
            $users = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->where('role','=','department')
            ->select('users.*'
            ,'departments.fname as division')
            ->get();
        }elseif($users->role=='department'){
            $users = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->where('role','=','user')
            ->select('users.*'
            ,'departments.fname as division')
            ->get();
        }
        
        return view('user.index',['users' => $users]);
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
