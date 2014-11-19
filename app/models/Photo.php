<?php

class Photo extends \Eloquent
{

    public function holder()
    {
        return $this->morphTo();
    }


//    public static function boot()
//    {
//        parent::boot();


//        static::created(function ($post) {
//
//
//                $publication_title = $post->holder->title;
//                $file_alias = Mascame\Urlify::filter($publication_title) . '_' . $post->id;
//                $post->test = public_path($post->img_orig);
//
//                $img = Image::make(public_path($post->img_orig));
//
//                $urli = 'images/portfolio/orig/' . $file_alias . '.jpg';
//                $img->save(public_path($urli));
//                $post->img_orig = $urli;
//
//                $img->resize(1920, 1070);
//                $urli1 = 'images/portfolio/' . $file_alias . '.jpg';
//                $img->save(public_path($urli1));
//                $post->img = $urli1;
//
//                $img->resize(640, 480);
//                $urli2 = 'images/portfolio/thumb/' . $file_alias . '.jpg';
//                $img->save(public_path($urli2));
//                $post->img_thumb = $urli2;
//
//                $img->resize(120, 80);
//                $urli3 = 'images/portfolio/small/' . $file_alias . '.jpg';
//                $img->save(public_path($urli3));
//                $post->img_small = $urli3;
//
//                $post->save();
//                }
//
//
//        );
//
//        static::updating(function ($post) {
//
//                $publication_title = $post->holder->title;
//                $file_alias = Mascame\Urlify::filter($publication_title) . '_' . $post->id;
//                $post->test = public_path($post->img_orig);
//
//                $img_n = Image::make(public_path($post->img_orig));
//
//                $urli = 'images/portfolio/orig/' . $file_alias . '.jpg';
//                $img_n->save(public_path($urli));
//                $post->img_orig = $urli;
//
//                $img_n->resize(1920, 1070);
//                $urli1 = 'images/portfolio/' . $file_alias . '.jpg';
//                $img_n->save(public_path($urli1));
//                $post->img = $urli1;
//
//                $img_n->resize(640, 480);
//                $urli2 = 'images/portfolio/thumb/' . $file_alias . '.jpg';
//                $img_n->save(public_path($urli2));
//                $post->img_thumb = $urli2;
//
//                $img_n->resize(120, 80);
//                $urli3 = 'images/portfolio/small/' . $file_alias . '.jpg';
//                $img_n->save(public_path($urli3));
//                $post->img_small = $urli3;
////                $post->save();
//            }
//        );


//    }


}


Photo::saving(function ($model) {

    $holder = $model->holder->title;
    $holder_id = $model->holder->id;

    if ($model->getDirty()) {
        if ($holder) {
            $newname = 'interier_'.Mascame\Urlify::filter($holder) . '_' . str_random(4);
            $newname = 'images/photos/' . $newname;
        }
        $img_big = Image::make($model->img_orig)->resize(1900, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->sharpen(1)->encode(null, 100)->save(public_path($newname . '_big.jpg'));
        $img_medium = Image::make($model->img_orig)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->sharpen(2)->encode(null, 100)->save(public_path($newname . '_medium.jpg'));
//        $img_small = Image::make($model->img_orig)->resize(600, null, function ($constraint) {
//            $constraint->aspectRatio();
//            $constraint->upsize();
//        })->sharpen(4)->encode(null, 100)->save(public_path($newname . '_small.jpg'));
//        $img_thumb = Image::make($model->img_orig)->resize(400, null, function ($constraint) {
//            $constraint->aspectRatio();
//            $constraint->upsize();
//        })->sharpen(5)->encode(null, 100)->save(public_path($newname . '_thumb.jpg'));
        $model->img_big = $newname . '_big.jpg';
        $model->img_medium = $newname . '_medium.jpg';
//        $model->img_small = $newname . '_small.jpg';
//        $model->img_thumb = $newname . '_thumb.jpg';
    }
});

Photo::updated(function ($photo) {
//    $gal->makepics();
});

Photo::deleting(function ($photo) {
    if (!empty($photo->img_orig)) File::delete($photo->img_orig);
    if (!empty($photo->img_big)) File::delete($photo->img_big);
    if (!empty($photo->img_medium)) File::delete($photo->img_medium);
//    if (!empty($photo->img_small)) File::delete($photo->img_small);
//    if (!empty($photo->img_thumb)) File::delete($photo->img_thumb);
});
