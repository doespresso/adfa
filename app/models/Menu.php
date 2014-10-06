<?php

class Menu extends \Eloquent {
    protected $table = 'menus';
	protected $fillable = [];

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
    public function page(){
        return $this->morphTo('Page');
    }
}