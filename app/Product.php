<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','photo','model','price'];

    // relasi many-to-many
    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }
}
