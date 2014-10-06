<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class PageSchema extends BaseSchema {

    protected $model = 'Page';

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


    public function fields($schema)
    {
        $schema->increments('id');
        $schema->string('title')->label('Заголовок');
        $schema->string('controller_name')->label('Связанный контроллер');
        $schema->string('alias');
        $schema->ckedit('content')->label('Текст');
        $schema->ckedit('footercontent')->label('Текст снизу');
        $schema->embed('meta', 'metas');
        $schema->boolean('active');
        $schema->boolean('show_title_static')->label('Показывать заголовок раздела вместе с контентом');
        $schema->boolean('show_brand')->label('Показывать название сайта сверху');
        $schema->boolean('show_slogan')->label('Показывать слоган сверху');
        $schema->timestamps(false);
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
        $schema->col('updated_at')->orderDirection('desc');
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