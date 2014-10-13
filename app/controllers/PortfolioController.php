<?php

class PortfolioController extends BaseController {




    public function index($params)
    {

        $portfolios = Portfolio::with('publication','style','photos')->active()->orderBy('year','desc')->get();
        $page = $params['page'];
        $meta = $params['meta'];
        return View::make('portfolio.index',compact('portfolios'))->with([
            'page'=>$page,
            'meta'=>$meta,
            'showfilter'=>true,
        ]);
    }

    public function show($params)
    {
        $portfolio = Portfolio::where('alias','=',$params['element'])->firstOrFail();
        $portfolio->load('photos')->load('meta')->load('publication.magazin');
//        $portfolio;
        $page = $params['page'];
        $meta = $params['meta'];

        if($portfolio->meta) {
            $meta = $portfolio->meta;
        }

        $og['title'] = $portfolio->title;
        if(!empty($portfolio->front_img)) $og['img'] = $portfolio->front_img;
        if(!empty($portfolio->preambula)) {
            $og['description'] = $portfolio->preambula;
        } else {
            $og['description'] = $portfolio->title;
        }

        $prev = $portfolio->prevport();
        $next = $portfolio->nextport();

        return View::make('portfolio.show-alter',compact('portfolio'))->with(array(
            'page'=>$page,
            'meta'=>$meta,
            'title'=>$portfolio->title,
            'og'=>$og,
            'show'=>true,
            'next'=>$next,
            'prev'=>$prev,
        ));
    }

}
