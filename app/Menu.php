<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title','slug','parent_id'];

    public function childs() {
        return $this->hasMany('App\Menu','parent_id','id') ;
    }
}
