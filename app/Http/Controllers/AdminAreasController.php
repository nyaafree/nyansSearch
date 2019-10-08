<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AddAreaRequest;
use App\Http\Requests\EditAreaRequest;
use Illuminate\Support\Facades\Session;

class AdminAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('id','ASC')->paginate(10);
        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAreaRequest $request)
    {
       Area::create($request->all());
       Session::flash('flash_admin', 'エリアが追加されました');
       return redirect('/admin/areas');
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
        $area = Area::find($id);
        return view('admin.areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAreaRequest $request, $id)
    {
        $area = Area::findOrFail($id);
        $input = $request->all();
        $area->update($input);
        Session::flash('flash_admin', 'エリア名は変更されました');
        return redirect('/admin/areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::findOrFail($id)->delete();
        Session::flash('flash_admin', 'エリアを削除しました');
        return redirect('/admin/areas');
    }
}
