@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @yield('content')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-2">
                                <a href="{{ url('article') }}">
                                    <button class="btn btn-success btn-lg">
                                        Articles
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ url('imagelist') }}">
                                    <button class="btn btn-success btn-lg">
                                        Images
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
