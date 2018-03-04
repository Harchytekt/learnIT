<div class="col-12 col-md-8 offset-md-2 vignetteBg" id="commentsBlock">
    <img class="tape" id="up" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">

    <h2 class="grey">Commentaires</h2>

    <div class="outer">
        <div class="inner innerComment">
            @if ($course->hasComments())
                <div id="commentList">
                    <ul class="list-group">
                        @foreach ($course->comments as $comment)
                            <li class="list-group-item">
                                <div class="green">
                                    {{ $comment->body }}
                                </div>
                                <span class="commentInfos">{{ $comment->created_at->diffForHumans() }}, par <span class="commentAuthor">{{ $comment->user->username }}</span></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <hr>
            @endif
            <div class="card-block">
                <form method="POST" action="/cours/{{ $course->id }}/commentaires/">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Écrivez votre commentaire." required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ajoutez votre commentaire</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <img class="tape" id="bottom" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
</div>
