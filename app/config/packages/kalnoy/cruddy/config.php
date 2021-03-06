<?php return array(

    // The title of the application. It can be a translation key.
    'brand' => 'ADF',

    // The link to the main page
    'brand_url' => url('/'),

    // The name of the view that is used to render the dashboard.
    // You can specify an entity id prefixing it with `@` like so: `@users`.
    'dashboard' => 'cruddy::dashboard',

    // The URI that is prefixed to all routes of Cruddy.
    'uri' => '___end',

    // The permissions driver.
    'permissions' => 'stub',

    // The name of the filter that will be used for authentication.
    // I.e. `auth.basic` or `auth`.
    'auth_filter' => null,

    // The main layout view.
    'layout' => 'cruddy::layout',

    // The default ace theme.
    'ace_theme' => 'chrome',

    // The list of key value pairs where key is the entity id and value is
    // an entity class name. For example:
    // 
    // 'users' => 'UserEntity'
    // 
    // Class is resolved through the IoC container.
    'entities' =>
        [
            'menus' => 'MenuSchema',
            'pages' => 'PageSchema',
            'magazines' => 'MagazinSchema',
            'publications' => 'PublicationSchema',
            'posts' => 'PostSchema',
            'metas' => 'MetaSchema',
            'styles' => 'StyleSchema',
            'portfolios' => 'PortfolioSchema',
            'galleries' => 'GallerySchema',
            'photos' => 'PhotoSchema',
            'cals' => 'CalSchema',
            'persons' => 'PersonSchema',
            'slidetypes' => 'SlidetypeSchema',
            'slides' => 'SlideSchema',
            'contents' => 'ContentSchema',
        ],

    // Main menu items.
    // 
    // How to define menu items: https://github.com/lazychaser/cruddy/wiki/Menu
    'menu' =>
        [
            ['entity' => 'pages', 'label' => 'Разделы сайта'],
            ['entity' => 'menus', 'label' => 'Меню'],
            ['entity' => 'posts', 'label' => 'Live'],
            ['entity' => 'magazines', 'label' => 'Журналы'],
            ['entity' => 'portfolios', 'label' => 'Портфолио'],
            ['entity' => 'persons', 'label' => 'Персоны'],
            ['entity' => 'styles', 'label' => 'Стили'],
            ['entity' => 'slides', 'label' => 'Слайдер'],
            ['entity' => 'contents', 'label' => 'ККК'],

        ],

    // The menu that is displayed to the right of the main menu.
    'service_menu' =>
        [
            [
                'label' => 'Специальное',
                'items' => [
                    ['entity' => 'slidetypes', 'label' => 'Типы слайдов'],
//                    ['entity' => 'metas', 'label' => 'META'],
                    ['entity' => 'galleries', 'label' => 'Галереи заливка'],
                    ['entity' => 'publications', 'label' => 'Публикации'],
//                    ['entity' => 'photos', 'label' => 'Фото'],
                ],
                // Any other attributes
            ],
        ],
);


Cruddy::saving('galleries', function ($action, $model) {
    Pic::create([
        'holder_id' => 2,
        'holder_type' => 'Portfolio',
        'url' => 'foto/int8.jpg',
    ]);
});