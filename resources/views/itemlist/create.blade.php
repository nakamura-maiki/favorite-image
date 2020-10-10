@extends('layouts.app')


@section('content')

 <h1 class="item-registration">アイテム登録</h1>

    <div class="row justify-content-center input-items">
        <div class="col-6">
            
            <!--<form action="/upload" method="post" enctype="multipart/form-data">-->
            <!--  {{ csrf_field() }}-->
            <!--  <input type="file" name="file">-->
            <!--  <button type="submit">保存</button>-->
            <!--</form>-->
            
            {!! Form::open(['url' => '/upload', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('myfile', 'Upload a file') !!}
                {!! Form::file('myfile', null) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Upload') !!}
            </div>
                {!! Form::close() !!}
            
             {!! Form::model($item, ['route' => 'items.store']) !!}
             
             
             
             @csrf

                <div class="form-group">
                    {!! Form::label('category_id', 'カテゴリ') !!}
                    
                    {!! Form::select('category_id', config('const.Categories'), '', ['placeholder' => '選択してください','class' => 'form-control']) !!}
                    
                    {{-- {!! Form::text('category_id', null, ['class' => 'form-control']) !!} --}}

                </div>

                <div class="form-group">
                    {!! Form::label('note', 'メモ') !!}
                    {!! Form::text('note', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-outline-light showbtn']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection