<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class SlidetypeSchema extends BaseSchema {

    protected $model = 'Slidetype';

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
//    protected $defaults = [ 'active' => 1,'sort'=>100 ];
    public function fields($schema)
    {
        $schema->increments('id');
        $schema->string('title')->label('Название');
        $schema->string('alias')->label('Ключ');
//        $schema->relates('slidetype','slidetypes');
//        $schema->relates('contenttype', 'contents')->filterOptions(function ($q)
//        {
//            $q->where('active', '=', 1);
//        });
//        $schema->relates('per', 'contents')->constraintWith('contenttype');
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
        $schema->col('alias');
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