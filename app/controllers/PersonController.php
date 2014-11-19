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

    public function show($params)
    {
        $person = Person::where('alias','=',$params['element'])->firstOrFail();
//        $portfolio->load('photos')->load('meta')->load('publication.magazin');
//        $portfolio;
        $page = $params['page'];
        $meta = $params['meta'];

        if($person->meta) {
            $meta = $person->meta;
        }

        $og['title'] = $person->title;
        if(!empty($person->img_orig)) $og['img'] = $person->img_orig;
        if(!empty($person->quote)) {
            $og['description'] = $person->quote;
        } else {
            $og['description'] = 'Дизайнер интерьеров '.$person->title;
        }

//        $prev = $portfolio->prevport();
//        $next = $portfolio->nextport();

        return View::make('person.show',compact('person'))->with(array(
            'page'=>$page,
            'meta'=>$meta,
            'title'=>$person->title,
            'og'=>$og,
            'show'=>true,
//            'next'=>$next,
//            'prev'=>$prev,
        ));
    }


}
