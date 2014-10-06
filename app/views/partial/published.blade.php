@if (!empty($pr->publication))
<div class="publicated content hidden">
    @if(!empty($pr->publication->first()->magazin->title))
    @if(!empty($pr->publication->first()->magazin->logo_inv))
    <img class="magazine-logo" src="{{asset($pr->publication->first()->magazin->logo)}}" alt="{{$pr->publication->first()->magazin->title}}"/>
    <img class="magazine-logo invert" src="{{asset($pr->publication->first()->magazin->logo_inv)}}" alt="{{$pr->publication->first()->magazin->title}}"/>
    @endif
       @if(!empty($pr->publication->first()->number))<p class="magazine-number"><span class="number">№{{$pr->publication->first()->number}}</span><span class="year">{{$pr->publication->first()->year}}</span></p>@endif
    @endif
</div>
@endif