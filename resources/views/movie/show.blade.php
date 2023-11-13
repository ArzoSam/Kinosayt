@extends('layouts.main')

@section('content')
<div class="show_glav">
    <div class="pl-5 d-flex w-100 justify-content-between align-items-center no_hover">
        <div class="w-25">
            <img class="w-100" src="{{url('/storage/app/public/' . $movie->image)}}" alt="">
        </div>
        <div class="show_div">
            <h1>Title : {{ $movie->title }}</h1>
            <p>Description : {!! $movie->description !!}</p>
            <p class="d-inline">Director : </p><a href="{{route('director.show', $movie->directors->id)}}">{{$movie->directors->name}}</a>
            <p>Year of the movie : {{$movie->year}}</p>
            <div><p class="d-inline">Actors : </p>@foreach($movie->actors as $actor)<a class="d-inline" href="{{route('actor.show', $actor->id)}}">{{$actor->name . ','}}  </a>@endforeach</div>
            <p>Genres : @foreach($movie->genres as $genre) {{$genre->genre . ','}}  @endforeach</p>
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
    </div>
    <section class="comment-list mb-5 comment_div">
        <h2 class="section-title mb-5" data-aos="fade-up">Comments ({{$movie->comments->count()}})</h2>
        <h2 class="section-title mb-5" data-aos="fade-up">Overall ({{$overall}})</h2>
        @include('movie.comments')
    </section>
    @auth()
        <section class="comment-section comment_div">
            <h2 class="section-title mb-5" data-aos="fade-up">Send Comment</h2>
            <form action="{{route('movie.comment.store' , $movie->id)}}" method="post">
                @csrf
                <div class="rating-form row">
                    <div class="comment-form-rating">
                        <span>Your rating</span>
                        <p class="stars">
                            <label for="rated-1"></label>
                            <input type="radio" id="rated-1" name="rating" value="1">
                            <label for="rated-2"></label>
                            <input type="radio" id="rated-2" name="rating" value="2">
                            <label for="rated-3"></label>
                            <input type="radio" id="rated-3" name="rating" value="3">
                            <label for="rated-4"></label>
                            <input type="radio" id="rated-4" name="rating" value="4">
                            <label for="rated-5"></label>
                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                        </p>
                    </div>
                    <div class="row">
                        <div class="form-group col-12" data-aos="fade-up">
                            <label for="comment" class="sr-only">Comment</label>
                            <textarea name="message" id="comment" class="form-control" placeholder="Comment"
                                      rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" data-aos="fade-up">
                            <input type="submit" value="Send Message" class="btn btn-warning">
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endauth

</div>
@endsection
