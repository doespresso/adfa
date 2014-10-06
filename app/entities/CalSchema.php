<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class CalSchema extends BaseSchema {

    protected $model = 'Cal';

    /**
     * The name of the column that is used to convert a model to a string.
     *
     * @var string
     */
    protected $titleAttribute = null;

    /**
     * The name of the column that will sort data by default.
     *
     * @var string
     */
    protected $defaultOrder = 'date';

    /**
     * Define some fields.
     *
     * @param $schema
     */
    public function fields($schema)
    {
        $schema->increments('id');
        $schema->date('date')->required();
        $schema->time('time');
        $schema->integer('duration')->append('мин');
        $schema->string('title')->required();
        $schema->string('description');
        $schema->image('img');
        $schema->markdown('full');
        $schema->timestamps();
    }

    /**
     * Define some columns.
     *
     * @param $schema
     */
    public function columns($schema)
    {
        $schema->col('date');
        $schema->col('time');
        $schema->col('duration');
        $schema->col('title');

//        $schema->col('updated_at')->orderDirection('desc');
    }

    /**
     * Define some files to upload.
     *
     * @param $repo
     */
    public function files($repo)
    {
        $repo->uploads('img')->to('images/cal');
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