<?php

class Gallery extends \Eloquent
{

    protected $table = 'galleries';

//    public function portfolio()
//    {
//        return $this->morphTo('Portfolio');
//    }

    public function portfolio()
    {
        return $this->belongsTo('Portfolio', 'gallery_holder_id');
    }

    public function getPicsAttribute($value)
    {
        return json_decode($value) ? : [];
    }

    public function setPicsAttribute($value)
    {
        $this->attributes['pics'] = json_encode($value);
    }

//    public function makepics()
//    {
//        Debugbar::info($this);
//        $c = 0;
//        $newpics = [];
//        foreach ($this->pics as $pic) {
//            Debugbar::info($pic);
//            $i = Image::make($pic);
//            Debugbar::info($i);
//            if (empty($this->title)) $this->title = 'asdasdkad adsjak djasd';
//            $url = Mascame\Urlify::filter($this->title) . '_' . $c . '.jpg';
//            Debugbar::info($url);
//            $i->save('images/gallery/' . $url);
//            $i->save('images/gallery/thumb_' . $url);
//            $i->save('images/gallery/small_' . $url);
//            $newpics[] = 'images/gallery/' . $url;
//            Debugbar::info($newpics);
//            $c++;
//        }
//        $this->pics = $newpics;
////        $this->save();
//    }


}


Gallery::saving(function ($model) {
    $c = 0;
    $newpics = [];
    $parent = $model->portfolio;
    if ($parent->photos) {
        $parent->photos()->delete();
//        $model->gallery_holder_type = $parent->title;
    }


    foreach ($model->pics as $pic) {
        $photo = new Photo;
        $photo->img_orig = $pic;
        $parent->photos()->save($photo);
        $c++;
    }
//    $model->pics = $newpics;
});

