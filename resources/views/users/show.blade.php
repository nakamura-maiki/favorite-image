@extends('layouts.app')

@section('content')

    <div class="icon">
        <!--//プロフ画　名前-->
        <img class="panda" src="{{ asset('/assets/images/8f38873ed4da475b6a88d67b9c3d52d2.jpg') }}" alt="プロフィール画像"></img>
        <p class="user-name" style="display: inline-block;" pb-50>{{ Auth::user()->name }}</p>
    </div>
    
    <div class="row d-flex align-items-center">
        <!--//ツールバーと「アイテム登録ボタン」-->
        <div class="col-sm-8">
                <ul class="nav nav-tabs nav-justified mb-3 navbar-dark" style="background-color:#444444;">
                    <li class="nav-item"><a href="#" id="itembar" class="nav-link">アイテム一覧</a></li>
                    <li class="nav-item"><a href="#" id="itembar" class="nav-link">トップス</a></li>
                    <li class="nav-item"><a href="#" id="itembar" class="nav-link">ボトムス</a></li>
                    <li class="nav-item"><a href="#" id="itembar" class="nav-link">ワンピース</a></li>
                </ul>
        </div>
        
        <div class="offset-md-1 col-md-3">
            <a href="#" id="itembtn" class="btn btn-outline-light">アイテム登録</a>
        </div>
        
    </div>
    
@endsection