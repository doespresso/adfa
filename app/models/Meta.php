<?php

class Meta extends \Eloquent {
    protected $table = 'metas';

    public function portfolio(){
        return $this->morphTo('Portfolio');
    }
    public function post(){
        return $this->morphTo('Post');
    }
    public function page(){
        return $this->morphTo('Page');
    }
}