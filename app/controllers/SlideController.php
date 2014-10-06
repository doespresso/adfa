<?php

class SlideController extends BaseController {



    public function set()
    {
        Schema::create('slides', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->smallInteger('active')->default(1);
            $table->integer('sort')->default(100);
        });
    }




}
