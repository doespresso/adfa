<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class PostSchema extends BaseSchema {

    protected $model = 'Post';

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
    protected $perPage = 100;

    /**
     * Define some fields.
     *
     * @param $schema
     */
    public function fields($schema)
    {
        $schema->increments('id');
        $schema->string('title');
        $schema->boolean('active');
		$schema->text('preambula')->label('Текст заметки');
        $schema->ckedit('text')->label('Текст заметки');
		$schema->string('url')->label("url источника c БЕЗ http://");
        $schema->embed('meta', 'metas');
        $schema->embed('photos', 'photos');
        $schema->relates('person', 'persons')->label('Автор');
        $schema->string('alias');
        $schema->timestamps();
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
//        $repo->uploads('img')->to('public/images/blog');
//        $repo->uploads('thumb')->to('public/images/blog/thumb');
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