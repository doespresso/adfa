<?php

class Post extends \Eloquent {
    protected $table = 'posts';
	protected $fillable = [];




    public static function boot()
    {
        parent::boot();

        static::saving(
            function($post)
            {
                if(empty($post->alias)){
                    $post->alias = Mascame\Urlify::filter($post->title);
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
                    $content->holder_type = 'Post';
                    $content->slidetype_id = Slidetype::where('alias', '=', 'Post')->first()->id;
                    $content->save();
                }
            }
        );

        static::deleted(
            function($model)
            {
                $model->content->delete();
            }
        );


    }

    public function scopeRandom($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }

    public function nextpost()
    {
        return Post::where('created_at', '<', $this->created_at)->first();
    }

    public function prevpost()
    {
        return Post::where('created_at', '>', $this->created_at)->first();
    }


    public function meta()
    {
        return $this->morphOne('Meta', 'meta_holder');
    }
    public function person(){
        return $this->belongsTo('Person');
    }
    public function photos()
    {
        return $this->morphMany('Photo', 'holder');
    }
    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
    public function scopeTrend($query)
    {
        return $query->where('cat_id', '=', 1);
    }
    public function scopeLive($query)
    {
        return $query->where('cat_id', '=', 2);
    }

    public function content()
    {
        return $this->morphOne('Content','holder');
    }

    public function slide()
    {
        return $this->morphOne('Slide','holder');
    }
}


