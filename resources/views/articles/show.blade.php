@extends('home')
@section('content')
    <h2>{{ $articles->title }}</h2>
    <br>
    <p> {{ $articles->content }}</p>
    <h1> {{ $articles->user->name }}</h1>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58aca523749ac154"></script>
    <div class="addthis_inline_share_toolbox"></div>
    <h2>Liste des commentaires</h2>
    @foreach($articles->comments AS $comment)
        <div>
            @if($comment->user)
                <h4>{{ $comment->user->name }}</h4>
            @endif
            <p>
                {{ $comment->comment }}
            </p>
        </div>
        <hr>
    @endforeach

    <form action="{{ route('article.comment', $articles->id) }}" method="post">
        {{ csrf_field() }}
        <textarea name="comment" class="form-control" placeholder="Votre commentaire"></textarea>
        <button class="btn btn-primary">Envoyer</button>
    </form>
   @endsection