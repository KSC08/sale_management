<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sector;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sector.index',['sectors' => sector::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector = new sector(
            [
                'fname' => $request->post('fname'),
                'sname' => $request->post('sname')
            ]
            );
        $sector->save();
        return redirect()->action([SectorController::class, 'index']);
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
        return view('sector.edit',[
            'sectors'=> DB::table('sectors')
            ->where('id','=',$id)->first()
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
        $sector = sector::find($id);
        $sector->fname = $request->post('fname');
        $sector->sname = $request->post('sname');
        $sector->save();
        return redirect()->action([SectorController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = sector::find($id);
        $sector->delete();
        return redirect()->action([SectorController::class, 'index']);
    }
}
