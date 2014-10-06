<?php

class Style extends \Eloquent {
	protected $fillable = [];
    public $timestamps = false;
    protected $table = 'styles';
    public function portfolios(){
        return $this->hasMany('Portfolio');
    }
    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
}