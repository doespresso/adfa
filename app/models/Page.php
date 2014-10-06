<?php

class Page extends \Eloquent {
	protected $fillable = [];

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
    public function meta()
    {
        return $this->morphOne('Meta', 'meta_holder');
    }
    public function menus()
    {
        return $this->morphMany('Menu', 'page_holder');
    }
//    public function alias()
//    {
//        return $this->morphOne('Alias', 'holder');
//    }
}