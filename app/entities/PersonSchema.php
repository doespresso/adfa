<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class PersonSchema extends BaseSchema {

    protected $model = 'Person';

    /**
     * The name of the column that is used to convert a model to a string.
     *
     * @var string
     */
    protected $titleAttribute = 'title';

    /**
     * The name of the column that will sort data by default.
     *
     * @var string
     */
    protected $defaultOrder = 'sort';

    /**
     * Define some fields.
     *
     * @param $schema
     */
    protected $defaults = [ 'active' => 1,'sort'=>100 ];
    public function fields($schema)
    {
        $schema->increments('id');
        $schema->string('title')->label("Имя");
        $schema->string('position')->label("Должность");
        $schema->ckedit('description')->label("Описание, био");
        $schema->text('quote')->label("Цитата");
        $schema->ckedit('quotetext')->label("Цитата - разъяснение");
        $schema->string('vk')->label("ВКонтакте URL");
        $schema->string('fb')->label("Facebook.com URL");
        $schema->string('twitter')->label("Twitter.com URL");
        $schema->string('insta')->label("Instagram USERNAME");
        $schema->image('img_orig')->label("Фото");
        $schema->integer('sort');
        $schema->boolean('active');
//        $schema->relates('content','contents');

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
        $schema->col('title');
        $schema->col('sort');
//        $schema->col('updated_at')->orderDirection('desc');
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

        ]);
    }
}

//Cruddy::saved('persons', function ($action, $model)
//{
//    if($model->img){
//        $holder = $model->title;
//        if($holder){
//            $newname = Mascame\Urlify::filter($holder).'_'.$model->id;
//            $newname ='images/persons/'.$newname;
//        }
//        $img = Image::make($model->img)->fit(400, 400)->save(public_path($newname.'.jpg'));
//        $img_small = Image::make($model->img)->resize(80,null, function ($constraint) {
//            $constraint->aspectRatio();
//            $constraint->upsize();
//        })->save(public_path($newname.'_small.jpg'));
//        $model->img = $newname.'.jpg';
//        $model->img_small = $newname.'_small.jpg';
//        $model->save();
//    }
//});
