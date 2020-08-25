@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the favorite-image</h1>
            </div>
        </div>
        
         <div class="container text-center">
                <div class="row">
                    <div class="col-md-12"><i class="far fa-user-circle" style="font-size: 200px"></i></div>
                    <div class="col-md-12">{!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}</div>
                     {{-- ユーザ登録ページへのリンク --}}
                    <div class="col-md-12">{!! link_to_route('signup.get', '新規登録の方はこちら', [], ['class' => 'nav-link']) !!}</div>
                </div>
            </div>
    @endif
@endsection

{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}