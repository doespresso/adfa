@if(!empty($og['title']))<meta property="og:title" content="{{$og['title']}}"/>@endif
@if(!empty($og['img']))<meta property="og:image" content="{{asset('')}}/{{$og['img']}}"/>@endif
@if(!empty($og['description']))<meta property="og:description" content="{{$og['description']}}"/>@endif