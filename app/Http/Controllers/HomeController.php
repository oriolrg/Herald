<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
Use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =  DB::table('articles')
            ->join('seccios', 'seccios.id', '=', 'articles.seccio_id')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->select('articles.*', 'seccios.title as titleSeccio', 'users.name as nom_usuari')->orderBy('created_at','DESC')->paginate(15);

        return view('home',compact('items'));
    }
}
