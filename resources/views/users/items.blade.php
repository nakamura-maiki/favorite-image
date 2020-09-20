
@if (count($items) > 0)
    <div class="row item-list">
        @foreach ($items as $item)
            
        <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('/assets/images/ダウンロード.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body list">
                <p>カテゴリ：{!! config('const.Categories')[$item->category_id] !!}</p><br>
                <p>メモ：{!! nl2br(e($item->note)) !!}</p>
              </div>
            </div>
            
            <div>
                @if (Auth::id() == $item->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
            
        
        @endforeach
    </div>
    
@endif

