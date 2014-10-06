
<ul id="filter"><li><a class="active" href="#" data-group="all"><span>все стили</span></a></li>@foreach($styles as $style)<li><a href="#" data-group="{{$style->title}}"><span>{{$style->title}}</span></a></li>@endforeach</ul>
