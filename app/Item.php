<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Item extends Model

{


    public $fillable = ['title','description','user_id', 'seccio_id'];

    public function articles()
    {
        return $this->belongsTo('App\Seccio', 'foreing_key');
    }
}
