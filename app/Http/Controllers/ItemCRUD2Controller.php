<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Auth;

use App\Article;

use App\Seccio;

use App\User;

Use DB;


class ItemCRUD2Controller extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
        $this->addUserId($request);
        if($request['user_id']!=1){
            $items =  DB::table('articles')
                ->join('seccios', 'seccios.id', '=', 'articles.seccio_id')
                ->join('users', 'users.id', '=', 'articles.user_id')
                ->select('articles.*', 'seccios.title as titleSeccio', 'users.name as nom_usuari')->orderBy('id','DESC')->where('user_id', $request['user_id'])->paginate(5);
        }else{
            $items =  DB::table('articles')
                ->join('seccios', 'seccios.id', '=', 'articles.seccio_id')
                ->join('users', 'users.id', '=', 'articles.user_id')
                ->select('articles.*', 'seccios.title as titleSeccio', 'users.name as nom_usuari')->orderBy('id','DESC')->paginate(5);
        }
        return view('ItemCRUD2.index',compact('items'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $seccions = Seccio::lists('title','id');

        return view('ItemCRUD2.create',compact('seccions'));

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        $this->addUserId($request);

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required|max:140',

            'contingut' => 'required',

            'user_id' => 'required',

            'seccio_id' => 'required',

            'path'=>'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:2000',

        ]);

        Article::create($request->all());


        return redirect()->route('itemCRUD2.index')

            ->with('success','Article creat correctament');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
       $items =  DB::table('articles')
                ->join('seccios', 'seccios.id', '=', 'articles.seccio_id')
                ->join('users', 'users.id', '=', 'articles.user_id')
                ->select('articles.*', 'seccios.title as titleSeccio', 'users.name as nom_usuari')->where('articles.id', $id)->orderBy('id','DESC');

        $item = Article::find($id);
        $seccio = Seccio::find($item['seccio_id']);
        $user = User::find($item['user_id']);
        return view('ItemCRUD2.show',compact('item', 'seccio', 'user'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $seccions = Seccio::lists('title','id');

        $item = Article::find($id);

        return view('ItemCRUD2.edit',compact('item', 'seccions'));

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
        $this->addUserId($request);

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required|max:140',

            'contingut' => 'required',

            'user_id' => 'required',

            'seccio_id' => 'required',

            'path'=>'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:2000',

        ]);

        Article::find($id)->update($request->all());


        return redirect()->route('itemCRUD2.index')

            ->with('success','Item updated successfully');

    }
    /**
     * Afegeix id usuari al request
     *
     * @param Request $request
     */
    public function addUserId(Request $request){
        if (Auth::user())
        {
            $id = Auth::user()->id;
        }
        $user_id = array('user_id' => $id);
        $request->merge($user_id);
    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Article::find($id)->delete();

        return redirect()->route('itemCRUD2.index')

            ->with('success','Item deleted successfully');

    }

}