<?php

class Pic extends \Eloquent
{

    protected $table = 'pics';

    public function portfolio()
    {
        return $this->hasOne('Portfolio','holder_id');
    }
}
