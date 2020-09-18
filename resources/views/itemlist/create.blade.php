@extends('layouts.app')


@section('content')

 <h1>アイテム登録</h1>

    <div class="row">
        <div class="col-6">
             {!! Form::model($item, ['route' => 'items.store']) !!}

                <div class="form-group">
                    {!! Form::label('category_id', 'カテゴリ') !!}
                    
                    {!! Form::select('category_id', ['1' => 'トップス', '2' => 'ボトムス', '3' => 'ワンピース'], '', ['placeholder' => '選択してください','class' => 'form-control']) !!}
                    
                    {{-- {!! Form::text('category_id', null, ['class' => 'form-control']) !!} --}}

                </div>

                <div class="form-group">
                    {!! Form::label('note', 'メモ') !!}
                    {!! Form::text('note', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection