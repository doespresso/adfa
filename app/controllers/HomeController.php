<?php

class HomeController extends BaseController {

    public function index($params)
    {
        $page = $params['page'];
        $meta = $params['meta'];
        $persons = Person::active()->get();
        $slides = Slide::active()->orderBy('sort')->get();

//        foreach($slides as $slide){
//            echo $slide->holder->title;
//        }
        return View::make('home.index')->with([
            'page'=>$page,
            'meta'=>$meta,
            'persons'=>$persons,
            'slides'=>$slides
        ]);
    }


}
