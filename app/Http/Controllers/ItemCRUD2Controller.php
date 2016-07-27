<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Auth;

use App\Item;

use App\Seccio;


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
            $items = Item::orderBy('id','DESC')->where('user_id', $request['user_id'])->paginate(5);
        }else{
            $items = Item::orderBy('id','DESC')->paginate(5);
        }
        return $items;
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

            'description' => 'required',

            'user_id' => 'required',

            'seccio_id' => 'required',

        ]);

        Item::create($request->all());


        return redirect()->route('itemCRUD2.index')

            ->with('success','Item created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $item = Item::find($id);

        return view('ItemCRUD2.show',compact('item'));

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

        $item = Item::find($id);

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

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        Item::find($id)->update($request->all());


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

        Item::find($id)->delete();

        return redirect()->route('itemCRUD2.index')

            ->with('success','Item deleted successfully');

    }

}