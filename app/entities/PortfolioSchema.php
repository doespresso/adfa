<?php

use Kalnoy\Cruddy\Schema\BaseSchema;
use Kalnoy\Cruddy\Service\Validation\FluentValidator;

class PortfolioSchema extends BaseSchema {

    protected $model = 'Portfolio';

    /**
     * The name of the column that is used to convert a model to a string.
     *
     * @var string
     */
    protected $titleAttribute = 'privtitle';

    /**
     * The name of the column that will sort data by default.
     *
     * @var string
     */
    protected $defaultOrder = 'sort';
    protected $perPage = 100;
    protected $filters = ['style'];
    protected $defaults = [ 'active' => 1,'sort'=>100];

    /**
     * Define some fields.
     *
     * @param $schema
     */
    public function fields($schema)
    {
        $schema->increments('id');
        $schema->string('title');
        $schema->string('privtitle')->label('Служебное название (не отображается)');
        $schema->integer('year')->label('Год');
        $schema->boolean('active');
        $schema->string('preambula');
        $schema->ckedit('description');
        $schema->relates('style', 'styles')->label('Стиль');
//        $schema->embed('gallery', 'galleries')->label('Фотографии');
//        $schema->relates('pic', 'pics')->label('pic');
//        $schema->image('front_img')->label('Изображение для обложки');
        $schema->integer('area');
        $schema->embed('photos', 'photos');
        $schema->embed('meta', 'metas');
        $schema->embed('publication', 'publications');
        $schema->string('alias');
        $schema->integer('sort');
        $schema->timestamps(false);
    }

    /**
     * Define some columns.
     *
     * @param $schema
     */

    public function layout($l)
    {
////        $l->row([ 'first_name', 'last_name' ]);
////        $l->fieldset('Credentials', [ 'email', 'password' ]);
//
//        $l->fieldset('Объект', ['title']);
//        $l->fieldset('Meta', 'meta');
    }

    public function columns($schema)
    {
        $schema->col('id');
//        $schema->col('front_img')->format('Image', [ 'height' => 100, 'width'=>124]);
        $schema->col('title');
        $schema->col('privtitle');
        $schema->col('style');
        $schema->col('active');
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
            'title' => 'required',
            'photos' => 'required',
            'style' => 'required',
        ]);
    }
}

