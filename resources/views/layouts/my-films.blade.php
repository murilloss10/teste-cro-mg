
<div class="row">

    @forelse ($dataFilms as $dado)

        <div class="col-lg-3">
            <figure class="figure">
                <img src="{{$dado->image_film}}" class="figure-img img-fluid rounded" alt="{{$dado->title}}">
                <figcaption class="figure-caption">{{$dado->title}} | {{$dado->release_year}} | {{$dado->director}} </figcaption>
            </figure>
        </div>

    @empty
    @endforelse

</div>
