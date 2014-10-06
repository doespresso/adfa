<?php

class Magazin extends \Eloquent {
	protected $fillable = [];
    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
    public function publications()
    {
        return $this->hasMany('Publication', 'magazin_id')->orderBy('year');
    }
}