<?php

class PageController extends BaseController
{

    public function index($params)
    {

        $meta = Config::get('site.meta');
        $div = Page::with('meta')->where('alias', '=', $params['page'])->active()->first();
//        return $div;
        if ($div) {
            if ($div->meta) $meta = $div->meta;
            if ($params['element']) {
//                var_dump ($params['element']);
                return App::make($div->controller_name . 'Controller')->show(array('page' => $div, 'meta' => $meta, 'element' => $params['element']));
            } else {
//                var_dump($params['element']);
                return App::make($div->controller_name . 'Controller')->index(array('page' => $div, 'meta' => $meta));
            }
        }
        else    {
            return false;
        }
    }


}


