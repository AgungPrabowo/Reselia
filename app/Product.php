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

    public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove relation to category
            $model->categories()->detach();
        });
    }

    public function getPhotoPathAttribute()
    {
        if($this->photo !== '') {
            return url('/img/' . $this->photo);
        } else {
            return 'http://placehold.it/850x618';
        }
    }
}
