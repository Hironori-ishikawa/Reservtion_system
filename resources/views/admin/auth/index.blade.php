@extends('layouts.layout_admin')

@section('content')
<div class="remote-list">
  <h2>予約履歴一覧</h2>
  <table>
    <div class="list-column">
      <tr>
        <td>ログインID</td>
        <td>予約種類</td>
        <td>開始日時</td>
        <td>終了日時</td>
        <td>予約時間</td>
      </tr>
    </div>
    @foreach ($list as $list)
    <tr>
        <td>{{ $list->user_id }}</td>
        <td>{{ $list->title }}</td>
        <td>{{ $list->start_at }}</td>
        <td>{{ $list->end_at }}</td>
        <td>{{ $list->created_at }}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
