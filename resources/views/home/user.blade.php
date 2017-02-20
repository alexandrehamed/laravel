@extends('home')

@section('content')
    <li> Bonjour {{Auth::user()->name}} !</li>
    <li> Votre mail est : {{Auth::user()->email}}</li>
    <li> Votre compte a été créé le {{Auth::user()->created_at}}</li>

    <h1> Vos articles sont :</h1>
    <ul>

        @forelse (Auth::user()->articles as $article)
            <li> {{$article->content}}</li>
        @empty
            <li>Aucun article</li>
        @endforelse


    </ul>
@endsection