<?php

class PressController extends BaseController {

    public function index($params)
    {
        $page = $params['page'];
        $meta = $params['meta'];
        $magazines = Magazin::active()->get();

//        return $magazines;
        return View::make('press.index',compact('magazines'))->with(array(
            'page'=>$page,
            'meta'=>$meta,
            'page_title'=>$page->title,
            'brand_hide'=>true,
        ));
    }

}
