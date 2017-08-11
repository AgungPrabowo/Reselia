<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','parent_id'];

    // relasi one-to-many
    public function childs()
    {
    	return $this->hasMany('App\Category', 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo('App\Category', 'parent_id');
    }

    // relasi many-to-many
    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove relations to products
            $model->products()->detach();

            // remove parent from this category's child
            foreach($model->childs as $child) {
                $child->parent_id = '';
                $child->save();
            }
        });
    }

    /**
    * Get all product id from active category and its childs
    */
    public function getRelatedProductsIdAttribute()
    {
        $result = $this->products->pluck('id')->toArray();
        foreach($this->childs as $child) {
            $result = array_merge($result, $child->related_products_id);
        }

        return $result;
    }

    public function scopeNoParent($query)
    {
        return $this->where('parent_id', '');
    }

    public function getTotalProductsAttribute()
    {
        return Product::whereIn('id', $this->related_products_id)->count();
    }
}
