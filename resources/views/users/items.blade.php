
@if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>カテゴリ</th>
                    <th>メモ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->category＿id }}</td>
                    <td>{{ $item->note }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endif

{!! link_to_route('items.create', 'アイテム登録', [], ['class' => 'btn btn-primary']) !!}
