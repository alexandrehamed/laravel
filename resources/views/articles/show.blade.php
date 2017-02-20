@extends('home')
@section('content')
    <h2>{{ $articles->title }}</h2>
    <br>
    <p> {{ $articles->content }}</p>
    <h1> {{ $articles->user->name }}</h1>
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