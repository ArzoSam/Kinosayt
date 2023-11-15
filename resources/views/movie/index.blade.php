@extends('layouts.main')

@section('content')
    <div class="catalog_glav">
        <div class="pl-5 d-flex w-100 justify-content-between no_hover for_media">
            <div class="col-lg-3 sidebar_main_div">
                <div class="sidebar-area">
                    <div class="sidebar-item">
                        <h4 class="sidebar-title">Film Directors</h4>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                @foreach($directors as $director)
                                    @if(is_object($director))
                                        <li>
                                            <input type="checkbox" class="sort_by_director_inp"
                                                   name="director[]"
                                                   id="cat_check{{$director->id}}" value="{{$director->id}}">
                                            <label class="sort_by_director_lab"
                                                   for="cat_check{{$director->id}}">
                                                {{$director->name}}
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-item">
                        <h4 class="sidebar-title">Film Actors</h4>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                @foreach($actors as $actor)
                                    @if(is_object($actor))
                                        <li>
                                            <input type="checkbox" class="sort_by_actor_inp"
                                                   name="actor[]"
                                                   id="cat_check{{$actor->id}}" value="{{$actor->id}}">
                                            <label class="sort_by_actor_lab"
                                                   for="cat_check{{$actor->id}}">
                                                {{$actor->name}}
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-item">
                        <h4 class="sidebar-title">Film Years</h4>
                        <div class="sidebar-body">
                            <ul class="tags sidebar-list">
                                @if(is_object($years))
                                    @foreach($years as $year)
                                        <li>
                                            <input type="checkbox" class="sort_by_year_inp"
                                                   name="year[]"
                                                   id="year_check{{$year}}" value="{{$year->year}}">
                                            <label class="sort_by_year_lab"
                                                   for="year_check{{$year}}">
                                                {{$year->year}}
                                            </label>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                        </div>
                    </div>
                    <div class="sidebar-item">
                        <ul class="yearFromToUl">
                            <h4>Year(from-to)</h4>

                            <span>From</span><input type="number" style="width: 100px; margin-bottom: 10px;"
                                                    name="year_from" class="year_from" id="" value="1950">
                            <br>
                            <span>To</span><input type="number" style="width: 100px; margin-bottom: 10px;"
                                                  name="year_to" class="year_to" id="" value="2024">
                            <br>
                            <button class="year_filter">filter</button>
                        </ul>
                    </div>
                    <div class="sidebar-item">
                        <ul class="rateFromToUl">
                            <h4>Rate(from-to)</h4>

                            <span>From</span><input type="number" style="width: 100px; margin-bottom: 10px;"
                                                    name="rate_from" class="rate_from" id="" value="0">
                            <br>
                            <span>To</span><input type="number" style="width: 100px; margin-bottom: 10px;"
                                                  name="rate_to" class="rate_to" id="" value="5">
                            <br>
                            <button class="rate_filter">filter</button>
                        </ul>
                    </div>
                    <div class="sidebar-item media_sidebar_item">
                        <div class="sort-by-wrapper">
                            <label for="sort" class="sr-only">Sort By</label>
                            <select name="sort" id="sort" class="option">
                                <option value="sbn">Sort By Newest</option>
                                <option value="sbr">Sort By Rating</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-wrapper-a">
                <div class="product-wrapper">
                    @foreach($movies as $movie)

                        <div class="w-25">
                            <a href="{{route('movie.show', $movie->id)}}" style="color: black">
                                <img src="{{'/storage/app/public/'.$movie->image}}" class="w-75"
                                     alt="Image of {{ $movie->title }}">
                                <div class="rating-star">
                                    @for($i=0; $i<5 ; $i++)
                                        @if($movie->comments->where('movie_id', $movie->id)->avg('rating') > $i)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i style="color: lightgrey;" class="fa fa-star color"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h3>{{ $movie->title }}</h3>
                            </a>
                            @auth()
                                <form action="{{ route('movie.like.store', $movie->id) }}" method="post">
                                    @csrf
                                    <span>{{ $movie->liked_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fa{{auth()->user()->likedPosts->contains($movie->id) ? 's':'r'}} fa-regular fa-heart"></i>
                                    </button>
                                </form>
                            @endauth
                            @guest()
                                <div>
                                    <span>{{ $movie->liked_users_count }}</span>
                                    <i class="far fa-regular fa-heart"></i>
                                </div>
                            @endguest
                        </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-center mt-5">
                    {!! $movies->links() !!}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('custom_js')
    <script>
        $('.option').change(function () {
            let valueBy = $(this).val();
            if ($('input[name="director[]"]:checked').length > 0 ||
                $('input[name="actor[]"]:checked').length > 0 ||
                $('input[name="year[]"]:checked').length > 0) {
                var filter = 1;
                var director = [];
                var actors = [];
                var years = [];
                $('input[name="director[]"]:checked').each(function () {
                    director.push($(this).val());
                });

                $('input[name="actor[]"]:checked').each(function () {
                    actors.push($(this).val());
                });

                $('input[name="year[]"]:checked').each(function () {
                    years.push($(this).val());
                });
            } else {
                filter = null;
            }
            $.ajax({
                url: "{{route('movie.index')}}",
                type: "GET",
                data: {
                    valueBy: valueBy,
                    filter: filter,
                    director: director,
                    actors: actors,
                    years: years,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    var $response = $(data);
                    var dataToday = $response.find('.product-wrapper');
                    $('.product-wrapper').html(dataToday);
                },
            });
        })
        $('.year_filter').click(function () {
            var from = $('.year_from').val()
            var to = $('.year_to').val()
            var year_filter = 1;
            $.ajax({
                url: "{{route('movie.index')}}",
                type: "GET",
                data: {
                    year_from: from,
                    year_to: to,
                    year_filter: year_filter,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    var $response = $(data);
                    var dataToday = $response.find('.product-wrapper');
                    $('.product-wrapper-a').html(dataToday);
                },
            });
        })
        $('.rate_filter').click(function () {
            var from = $('.rate_from').val()
            var to = $('.rate_to').val()
            var rate_filter = 1;
            $.ajax({
                url: "{{route('movie.index')}}",
                type: "GET",
                data: {
                    rate_from: from,
                    rate_to: to,
                    rate_filter: rate_filter,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    var $response = $(data);
                    var dataToday = $response.find('.product-wrapper');
                    $('.product-wrapper-a').html(dataToday);
                },
            });
        })

        $('input[name="year[]"], input[name="director[]"], input[name="actor[]"]').change(function () {
            var years = [];
            var directors = [];
            var actors = [];
            var filter = 1;


            $('input[name="year[]"]:checked').each(function () {
                years.push($(this).val());
            });

            $('input[name="director[]"]:checked').each(function () {
                directors.push($(this).val());
            });

            $('input[name="actor[]"]:checked').each(function () {
                actors.push($(this).val());
            });
            console.log(years, directors, actors)
            $.ajax({
                type: 'GET',
                url: '{{route('movie.index')}}',
                data: {
                    years: years,
                    actors: actors,
                    director: directors,
                    filter: filter,
                },
                success: function (data) {
                    var $response = $(data);
                    var dataToday = $response.find('.product-wrapper');
                    $('.product-wrapper-a').html(dataToday);
                }
            });
        });
    </script>
@endsection
