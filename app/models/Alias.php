<?php

class Alias extends \Eloquent {
    protected $table = 'aliases';

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