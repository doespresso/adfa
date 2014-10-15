@if ($pr->publication->count())
<div class="publicated texted content">
    @if(!empty($pr->publication->first()->magazin->title))
    @if(!empty($pr->publication->first()->magazin->logo_inv))
    <div class="plabel">опубликовано в издании</div>
    <div class="pmag">«{{$pr->publication->first()->magazin->title}}»</div>
    @endif
       @if(!empty($pr->publication->first()->number))<div class="pnumber"><span class="number">№{{$pr->publication->first()->number}}</span> <span class="year">{{$pr->publication->first()->year}}</span></div>@endif
    @endif
</div>
@else
<div class="publicated texted content">
    <div class="plabel">готовится к публикации в профильном издании</div>
</div>
@endif
