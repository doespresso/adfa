<?php

class ContactController extends BaseController {
    public function index($params)
    {
        $page = $params['page'];
        $meta = $params['meta'];
        return View::make('contact.index')->with(array(
            'meta'=>$meta,
            'page'=>$page,
            'page_title'=>$page->title,
            'brand_hide'=>true,
        ));
    }

    public function set()
    {
        return true;
    }



}
