<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seccio;

use App\Permission;

use DB;


class SeccionsController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $seccions = Seccio::orderBy('id','DESC')->paginate(5);

        return view('seccions.index',compact('seccions'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $permission = Permission::get();

        return view('seccions.create',compact('permission'));

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        $seccio = new Seccio();

        $seccio->title = $request->input('title');

        $seccio->description = $request->input('description');

        $seccio->save();


        return redirect()->route('seccions.index')

            ->with('success','Seccio created successfully');

    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $seccio = Seccio::find($id);

        $rolePermissions = Permission::join("permission_roles","permission_roles.permission_id","=","permissions.id")

            ->where("permission_roles.role_id",$id)

            ->get();


        return view('seccions.show',compact('seccio','rolePermissions'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $seccio = Seccio::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("permission_roles")->where("permission_roles.role_id",$id)

            ->lists('permission_roles.permission_id','permission_roles.permission_id');


        return view('seccions.edit',compact('seccio','permission','rolePermissions'));

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

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        $seccio = Seccio::find($id);

        $seccio->title = $request->input('title');

        $seccio->description = $request->input('description');

        $seccio->save();

        return redirect()->route('seccions.index')

            ->with('success','Role updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        DB::table("roles")->where('id',$id)->delete();

        return redirect()->route('roles.index')

            ->with('success','Role deleted successfully');

    }

}