<?php

class Content extends \Eloquent {
    protected $table = 'Contents';

    public static function boot()
    {
        parent::boot();

        static::deleted(
            function($model)
            {
                if($model->slides){
                $model->slides()->delete();
                }
            }
        );

    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

    public function holder(){
        return $this->morphTo();
    }

    public function slides()
    {
        return $this->hasMany('Slide');
    }

    public function slidetype()
    {
        return $this->belongsTo('Slidetype','slidetype_id');
    }



}