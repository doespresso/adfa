<?php

class Portfolio extends \Eloquent
{
    protected $table = 'portfolios';

    public static function boot()
    {
        parent::boot();

        static::saving(
            function ($post) {
                if (empty($post->alias)) {
                    $post->alias = Mascame\Urlify::filter($post->title."_".str_random(2));
                }
            }
        );

        static::saved(
            function ($model) {
                if ($model->content) {
                    $model->content->title = $model->title;
                    $model->content->save();
                } else {
                    $content = new Content;
                    $content->title = $model->title;
                    $content->holder_id = $model->id;
                    $content->holder_type = 'Portfolio';
                    $content->slidetype_id = Slidetype::where('alias', '=', 'Portfolio')->first()->id;
                    $content->save();
                }
            }
        );

        static::deleted(
            function ($model) {
                $model->content->delete();
                if($model->publications) $model->publications->delete();
            }
        );


    }



    public function nextport()
    {
        return Portfolio::where('created_at', '<', $this->created_at)->first();
    }

    public function prevport()
    {
        return Portfolio::where('created_at', '>', $this->created_at)->first();
    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

    public function scopeRandom($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }

    public function style()
    {
        return $this->belongsTo('Style');
    }

    public function gallery()
    {
        return $this->hasOne('Gallery', 'gallery_holder_id');
    }

    public function publication()
    {
        return $this->morphMany('Publication', 'pub_holder');
    }

    public function photos()
    {
        return $this->morphMany('Photo', 'holder');
    }

    public function content()
    {
        return $this->morphOne('Content', 'holder');
    }

    public function slide()
    {
        return $this->morphOne('Slide', 'holder');
    }

    public function meta()
    {
        return $this->morphOne('Meta', 'meta_holder');
    }

//    public function photos()
//    {
//        return $this->morphMany('Photo', 'holder');
//    }
//    public function pic()
//    {
//        return $this->belongsToMany('Pic','holder_id','id');
//    }
}