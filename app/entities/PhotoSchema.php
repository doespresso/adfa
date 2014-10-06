<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class PhotoSchema extends BaseSchema {

    protected $model = 'Photo';

    /**
     * The name of the column that is used to convert a model to a string.
     *
     * @var string
     */
    protected $titleAttribute = 'photo';

    /**
     * The name of the column that will sort data by default.
     *
     * @var string
     */
    protected $defaultOrder = null;
    protected $defaults = [ 'active' => 1,'sort'=>100 ];

    /**
     * Define some fields.
     *
     * @param $schema
     */
    public function fields($schema)
    {
        $schema->increments('id');
        $schema->image('img_orig');
        $schema->string('description')->label('Строка описания');
        $schema->integer('sort');
        $schema->timestamps($hide = true);
    }

    /**
     * Define some columns.
     *
     * @param $schema
     */
    public function columns($schema)
    {
        $schema->col('id');
        $schema->col('img_orig')->format('Image');
        $schema->col('created_at')->orderDirection('desc');
    }

    /**
     * Define some files to upload.
     *
     * @param $repo
     */
    public function files($repo)
    {
        $repo->uploads('img_orig')->to('images/orig');
    }

    /**
     * Define validation rules.
     *
     * @param $v
     */
    public function rules($v)
    {
        $v->rules(
        [
            'img_orig' => 'required',
        ]);
    }
}


Cruddy::saved('photos', function ($action, $model) {
//    $holder = $model->holder->title;
//    if($holder){
//        $newname = Mascame\Urlify::filter($holder).'_'.$model->id;
//        $newname ='images/photos/'.$newname;
//    }
//    $img_big = Image::make($model->img_orig)->resize(1900,null, function ($constraint) {
//        $constraint->aspectRatio();
//        $constraint->upsize();
//    })->save(public_path($newname.'_big.jpg'));
//    $img_medium = Image::make($model->img_orig)->resize(null,700, function ($constraint) {
//        $constraint->aspectRatio();
//        $constraint->upsize();
//    })->save(public_path($newname.'_medium.jpg'));
//    $img_small = Image::make($model->img_orig)->resize(600,null, function ($constraint) {
//        $constraint->aspectRatio();
//        $constraint->upsize();
//    })->save(public_path($newname.'_small.jpg'));
//    $img_thumb = Image::make($model->img_orig)->resize(400,null, function ($constraint) {
//        $constraint->aspectRatio();
//        $constraint->upsize();
//    })->save(public_path($newname.'_thumb.jpg'));
//    $model->img_big = $newname.'_big.jpg';
//    $model->img_medium = $newname.'_medium.jpg';
//    $model->img_small = $newname.'_small.jpg';
//    $model->img_thumb = $newname.'_thumb.jpg';
    $model->save();
});