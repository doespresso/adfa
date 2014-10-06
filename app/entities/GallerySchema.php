<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class GallerySchema extends BaseSchema {

    protected $model = 'Gallery';

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
    protected $defaultOrder = null;

    /**
     * Define some fields.
     *
     * @param $schema
     */
    public function fields($schema)
    {
//        $schema->computed('holder', function ($model) {
//            $p = $model->port;
//            return $p['title'];
//        })->label('');
        $schema->relates('portfolio','portfolios');
        $schema->increments('id');
//        $schema->string('title');
        $schema->image('pics')->many();
        $schema->timestamps($hide = true);

    }

    /**
     * Define some columns.
     *
     * @param $schema
     */
    public function columns($schema)
    {
        $schema->col('portfolio');
        $schema->col('id');
        $schema->col('updated_at')->orderDirection('desc');
    }

    /**
     * Define some files to upload.
     *
     * @param $repo
     */
    public function files($repo)
    {
        $repo->uploads('pics')->to('images/orig');
//        $repo->uploads('pics')->to('files/gallery123');
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