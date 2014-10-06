<?php

class Cal extends \Eloquent {
	protected $fillable = [];
//    public $timestamps = false;
    protected $table = 'events';

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
}