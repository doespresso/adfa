@if($page->show_title_static == 1)
<div class="content"><h1><span>{{$page->title}}</span></h1></div>
@endif
@if($page->content)
<div class="content"><p>{{$page->content}}</p></div>
@endif