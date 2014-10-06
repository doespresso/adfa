<?php

class PersonController extends BaseController {

    public function index($params)
    {
        $page = $params['page'];
        $meta = $params['meta'];
        $persons = Person::active()->orderby('sort')->get();


        $og['title'] = $meta->title;
        if(!empty($page->content)) {
            $og['description'] = $page->content;
        } else {
            $og['description'] = $page->title;
        }


        return View::make('person.index',compact('persons'))->with(array(
            'page'=>$page,
            'page_title'=>$page->title,
            'og'=>$og,
            'meta'=>$meta,
        ));
    }


}
