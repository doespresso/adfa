<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class PublicationSchema extends BaseSchema {

    protected $model = 'Publication';


    protected $titleAttribute = null;


    protected $defaultOrder = 'year';


    public function fields($schema)
    {
        $schema->increments('id');
        $schema->relates('magazin','magazines');
        $schema->integer('year')->label('Год');
        $schema->integer('number')->label('Выпуск');
        $schema->integer('pagenumber')->label('Страница');
        $schema->string('url')->label('Ссылка на веб-источник');
        $schema->timestamps($hide = true);
    }


    public function columns($schema)
    {
        $schema->col('id');
//        $schema->col('title');
        $schema->col('magazin');
        $schema->col('year')->reversed();
    }


    public function files($repo)
    {

    }


    public function rules($v)
    {
        $v->rules(
        [
            'magazin' => 'required',
            'year' => 'required|numeric|min:1990|max:2020',
            'number' => 'required|numeric|min:1',
        ]);
    }
}