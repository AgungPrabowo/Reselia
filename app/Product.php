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

    // accessor
    public function getCategoryListsAttribute()
    {
    	if ($this->categories()->count() < 1) {
    		return null;
    	}
    	return $this->categories->pluck('id')->all();
    }
}
