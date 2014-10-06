<?php

class Person extends \Eloquent
{
    protected $fillable = [];
//    public $timestamps = false;
    protected $table = 'persons';


    public static function boot()
    {
        parent::boot();

        static::saving(
            function ($model) {

                if($model->img_orig){
                    $holder = $model->title;
                    if($holder){
                        $newname = Mascame\Urlify::filter($holder).'_'.$model->id;
                        $newname ='images/persons/'.$newname;
                    }
                    $img = Image::make($model->img_orig)->fit(400, 400)->save(public_path($newname.'.jpg'));
                    $img_small = Image::make($model->img_orig)->resize(80,null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(public_path($newname.'_small.jpg'));
                    $model->img = $newname.'.jpg';
                    $model->img_small = $newname.'_small.jpg';
//                    $model->save();
                }

                if ($model->content) {
                    $model->content->title = $model->title;
                    $model->content->save();
                } else {
                    $content = new Content;
                    $content->title = $model->title;
                    $content->holder_id = $model->id;
                    $content->holder_type = 'Person';
                    $content->slidetype_id = Slidetype::where('alias', '=', 'Person')->first()->id;
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

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

    public function posts()
    {
        return $this->hasMany("Post","owner_id");
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

