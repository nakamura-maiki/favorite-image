@extends('layouts.app')

@section('content')

    <h1 class=item-registration>アイテム編集ページ</h1>

    <div class="row justify-content-center">
        <div class="col-6">
            {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'put']) !!}

                
                 <div class="form-group">
                   {!! Form::label('category_id', 'カテゴリ') !!}
                    
                    {!! Form::select('category_id', ['tops' => 'トップス', 'bottoms' => 'ボトムス', 'onepiece' => 'ワンピース'], '', ['placeholder' => '選択してください','class' => 'form-control']) !!}
                    
                    {{-- {!! Form::text('category_id', null, ['class' => 'form-control']) !!} --}}
                    {{-- text部分をドロップダウンに変える --}}
                </div>

                <div class="form-group">
                    {!! Form::label('note', 'メモ') !!}
                    {!! Form::text('note', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('更新', ['id' => 'showbtn', 'class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection