<?php

class Slide extends \Eloquent {

    protected $table = 'Slides';

    public static function boot()
    {
        parent::boot();

        static::saving(
            function($slide)
            {
                $slide->holder_id = $slide->content->holder_id;
            }
        );

    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

    public function slidetype()
    {
        return $this->belongsTo('Slidetype','slidetype_id');
    }

    public function content()
    {
        return $this->belongsTo('Content','content_id');
    }

    public function holder(){
//        Debugbar::info($this->israndom);
//        if($this->israndom != 1){
        return $this->morphTo();
//        }
//        else{
//        $item = Portfolio::random();
//        }
    }



}