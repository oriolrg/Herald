<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model

{


    public $fillable = ['title','description','contingut', 'user_id', 'seccio_id', 'path'];

    public function articles()
    {
        return $this->belongsTo('App\Seccio', 'foreing_key');
    }
    //mutador
    public function setpathAttribute($path){
        if(isset($path)==True){
            $this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
            $name = Carbon::now()->second.$path->getClientOriginalName();
            //TODO controlar el tamany de la imatge i la possibilitat de nomes pujar imatges testing
            //return $path;
            //if(\File::size($path)<2000000){
                \Storage::disk('local')->put($name, \File::get($path));
            //}
        }
    }
}
