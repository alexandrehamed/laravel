@extends('home')
@section('content')
    @forelse($articles as $article)
                <h2>{{ $article->title }}</h2>
                <br>
                <p> {{ $article->content }}</p>
                <a href="{{ route('article.show',$article->id) }}"><button>Article</button></a>
                <a href="{{ route('article.edit',$article->id) }}"><button>modifier</button></a>
    @empty
    <h2>Pas d article</h2>
    @endforelse
    {{ $articles->links() }}

@endsection