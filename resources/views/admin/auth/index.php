@extends('layouts.layout_admin')

@section('content')
<div class="remote-list">
  <h2>予約履歴一覧</h2>
  <table>
    <div class="list-column">
      <tr>
        <td>予約種類</td>
        <td>開始日時</td>
        <td>終了日時</td>
        <td>予約時間</td>
      </tr>
    </div>
    @foreach ($list as $list)
    <tr>
        <td>{{ $list->title }}</td>
        <td>{{ $list->start_at }}</td>
        <td>{{ $list->end_at }}</td>
        <td>{{ $list->created_at }}</td>

        @if($list->user_id == $id)
        <td>
          <a class="btn btn-danger" href="/remote/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
        </td>
        @endif
    </tr>
    @endforeach
  </table>
</div>
@endsection
