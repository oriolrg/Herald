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
        $this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
        $name = Carbon::now()->second.$path->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($path));
    }
}
