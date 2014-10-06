<?php

class Publication extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'publications';

    public function magazin()
    {
       return $this->belongsTo('Magazin','magazin_id');
    }
//    public function port()
//    {
//        return $this->belongsTo('Portfolio','pub_holder_id');
//    }

    public function pub_holder(){
        return $this->morphTo();
    }

}