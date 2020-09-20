@extends('layouts.app')

@section('content')

    <div class="icon">
        <!--//プロフ画 名前-->
        <img class="panda" src="{{ asset('/assets/images/8f38873ed4da475b6a88d67b9c3d52d2.jpg') }}" alt="プロフィール画像"></img>
        <p class="user-name" style="display: inline-block;" pb-50>{{ Auth::user()->name }}</p>
    </div>
    
    <div class="row d-flex align-items-center">
        <!--//ツールバーと「アイテム登録ボタン」-->
        <div class="col-sm-8">
                <ul class="nav nav-tabs nav-justified mb-3 navbar-dark" style="background-color:#444444;">
                    <li class="nav-item"><a href="{{ route('category.items', "0" ) }}" class="nav-link itembar">アイテム一覧</a></li>
                    <li class="nav-item"><a href="{{ route('category.items', "1" ) }}" class="nav-link itembar">トップス</a></li>
                    <li class="nav-item"><a href="{{ route('category.items', "2" ) }}" class="nav-link itembar">ボトムス</a></li>
                    <li class="nav-item"><a href="{{ route('category.items', "3" ) }}" class="nav-link itembar">ワンピース</a></li>
                </ul>
        </div>
        
        <div class="offset-md-1 col-md-3">
            {{-- メッセージ作成ページへのリンク --}}
            {!! link_to_route('items.create', 'アイテム登録', [], ['class' => 'btn btn-outline-light itembtn']) !!}

            
        </div>
        
    </div>
    
    @include('users.items')
    
@endsection