<div class="display-ratings">
    @foreach($comments as $comment)
        <div class="rating-item">
            <div class="rating-meta d-flex justify-content-sm-between">
                <h3>{{$comment->user->name}}</h3>
                <span class="time">{{$comment->dateAsCarbon->diffForHumans()}}</span>
            </div>
            <div class="rating-author-txt">
                <div class="rating-star">
                    @for($i=0; $i<5 ; $i++)
                        @if($comment->rating > $i)
                            <i class="fa fa-star"></i>
                        @else
                            <i style="color: lightgrey;" class="fa fa-star color"></i>
                        @endif
                    @endfor
                </div>
                <p>{{$comment->message}}</p>
            </div>
        </div>
    @endforeach
</div>

