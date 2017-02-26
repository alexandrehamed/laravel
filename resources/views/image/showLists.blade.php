@extends('home');
@section('content');

<div class="container">
    <div class="row text-center">
        <div class="col-md-12"><h1>Liste des images</h1></div>
    </div>
</div>
@foreach( $images as $image )
    <div class="table table-bordered bg-success"><a href="{!! '/images/'.$image->filePath !!}">{{$image->filePath}}</a></div>
@endforeach


@endsection