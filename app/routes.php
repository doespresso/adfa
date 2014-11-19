<?php


//Route::get('/', function()
//{
//	return View::make('layouts.main');
//});

View::creator('layouts.*', function ($view) {
    $view->with('menu_links', Menu::active()->orderBy('sort', 'asc')->get());
});

View::creator('portfolio.*', function ($view) {
    $view->with('styles', Style::active()->orderBy('sort')->get());
});

//Route::get('/', array('as' => 'homepage', 'uses' => 'HomeController@index'));


//Route::get('set', function () {
//    Setting::forget('contact');
//    Setting::set('contact', array(
//            'phone' => '+7 495 542 77 34',
//            'e-mail' => 'info@artdefacto.ru',
//            'address' => 'Москва, ул. Дружбы 10',
//            'qr'=>''
//    ));
//    Setting::forget('qr');
//    Setting::set('qr', array(
//        'code' => ''
//    ));
//    return "ok";
//});

Route::get('/files', function () {
//	$files = File::files(public_path().'/images/photos/');
//	$count = 0;
//	foreach($files as $file){
//		$orig = 'images/photos/'.basename($file);
////		$p = Photo::where('img_orig','<>',$orig)->count();
////		echo $p;
//		if (
//			Photo::where('img_big','=',$orig)->first() ||
//			Photo::where('img_medium','=',$orig)->first()
//		){
//
//		}
//		else
//		{
//			echo $orig.'<br/>';
//			File::delete($file);
//			$count++;
//		}
//	}
//	echo $count;
	$ps = Photo::all();
	foreach ($ps as $p){
		echo $p->id . ' ';
		echo $p->holder_id . ' ';
		echo $p->holder_type . ' ';
		echo "<br/>";
		if($p->holder_type == 'Portfolio') {
			$h = Portfolio::find($p->holder_id);
			if ($h){
				echo "ok";
			}
			else
			{
				echo "fail";
				$p->delete();
			}
		}
		if($p->holder_type == 'Post') {
			$h = Post::find($p->holder_id);
			if ($h){
				echo "ok";
			}
			else
			{
				echo "fail";
				$p->delete();
			}
		}
	}
});


Route::get('/{page}/{id?}', function ($page,$id=null) {
    return App::make('PageController')->index(array('page' => $page, 'element' => $id));
});
Route::get('/', function () {
    return App::make('PageController')->index(array('page' => '/', 'element' => null));
});



//
//App::error(function ($exception) {
//        return Response::view('errors.missing', array(), 404);
//});