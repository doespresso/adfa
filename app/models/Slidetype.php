<?php

class Slidetype extends \Eloquent {

    protected $table = 'slidetypes';

    public static function boot()
    {
        parent::boot();


    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

    public function slides()
    {
        return $this->hasMany('Slide','slydetype_id');
    }
    public function contents()
    {
        return $this->hasMany('Content','slidetype_id');
    }



}