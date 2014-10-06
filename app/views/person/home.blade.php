<div class="row left-offset">
    @foreach($persons as $person)
    <div class="col-sm-6 col-md-5">
        <div class="media m">
            <a title="{{$person->title}}" class="media-object pull-left" href="/designers">
                <figure class="photo" style="background-image:url('{{asset($person->img)}}')"></figure>
            </a>
            <div class="media-body">
                <div><a href="/designers"><span>{{$person->quote}}</span></a></div>
            </div>
        </div>
    </div>
    @endforeach
</div>
