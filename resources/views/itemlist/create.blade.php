@extends('layouts.app')


@section('content')

 <h1>アイテム登録</h1>

    <div class="row">
        <div class="col-6">
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

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection