
@if (count($items) > 0)
       
                @foreach ($items as $item)
                
                <div>
                    {{-- 投稿内容 --}}
                    <p class="mb-0">
                        {!! config('const.Categories')[$item->category_id] !!}
                        {!! nl2br(e($item->note)) !!}
                        
                    </p>
                </div>
                
                <div>
                    @if (Auth::id() == $item->user_id)
                        {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                
                @endforeach
           
@endif

