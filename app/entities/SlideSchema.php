<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class SlideSchema extends BaseSchema {

    protected $model = 'Slide';

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
        $schema->string('title')->label('Название');
        $schema->relates('slidetype','slidetypes');
        $schema->relates('content', 'contents')->constraintWith('slidetype');
        $schema->integer('sort');
        $schema->boolean('active');
        $schema->boolean('israndom')->label('Случайный');
        $schema->timestamps(false);
//        $schema->relates('holder','portfolios');
//        $schema->relates('contenttype', 'contents')->filterOptions(function ($q)
//        {
//            $q->where('active', '=', 1);
//        });

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
        $schema->col('content');
        $schema->col('israndom');
        $schema->col('sort');
    }

    /**
     * Define some files to upload.
     *
     * @param $repo
     */
    public function files($repo)
    {

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


Cruddy::saved('slides', function ($action, $model) {
    $model->holder_id = $model->content->id;
    $model->holder_type = $model->slidetype->alias;
    $model->save();
});