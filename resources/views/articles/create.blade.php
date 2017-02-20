@extends('home')
@section('content')

    @if(count($errors) > 0)
        <ul>
            @foreach($erros->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route(('article.store')) }}" method="POST">
        {{csrf_field()}}
        <input type="text" name="title" placeholder="titre">
        <br>
        <textarea name="content"  id="" cols="38" rows="10"></textarea>
        <br>
        <input type="submit" value="Envoyer">
    </form>
@endsection