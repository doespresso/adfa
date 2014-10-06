<?php

class PostController extends BaseController {

    public function index($params)
    {
        $page = $params['page'];
        $meta = $params['meta'];
        $posts = Post::active()->orderBy('created_at','desc')->simplePaginate(10);
        return View::make('post.index',compact('posts'))->with(array(
            'meta'=>$meta,
            'page'=>$page,
        ));
    }

    public function show($params)
    {
        $page = $params['page'];
        $meta = $params['meta'];
        $post = Post::with('meta','photos')->where('alias','=',$params['element'])->firstOrFail();

        if($post->meta) {
            $meta = $portfolio->meta;
        }

        $og['title'] = $post->title;
        if(!empty($post->img)) $og['img'] = $post->img;
        if(!empty($post->content)) {
            $og['description'] = $post->content;
        } else {
            $og['description'] = $post->title;
        }


        $next = $post->nextpost();
        $prev = $post->prevpost();
//        return var_dump($prev);

        return View::make('post.show',compact('post'))->with(array(
            'page'=>$page,
            'show'=>true,
            'title'=>$post->title,
            'brand_hide'=>true,
            'og'=>$og,
            'meta'=>$meta,
            'prev'=>$prev,
            'next'=>$next
        ));
    }

}


