@extends('layouts.layout_user')

@section('content')
<div class="remote-form">
  <h1>ここはリモート予約のフォーム</h1>
  <div class="form-group">
    <form action="/remote" method="post">
      @csrf
      <div class="title">
        <input type="text" name="title" value="リモート予約" readonly="readonly">
      </div>
      <div class="start">
        <input type="date" name="start_date" value="2022-10-01">
        <input type="time" name="start_time" value="10:00">
      </div>
      <div class="end">
        <input type="date" name="end_date" value="2022-10-01">
        <input type="time" name="end_time" value="12:00">
      </div>

        <!-- 完了メッセージ -->
      @if (session('result'))
          <div style="color:green;">
              {{ session('result') }}
          </div>
          <br>
      @endif

      <!-- エラー表示 -->
      @if($errors->any())
          <div style="color:red;">
              【エラー】<br><br>
              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach
          </div>
          <br>
      @endif

      <div class="remote-botton">
        <button type="submit">予約する</button>
      </div>
    </form>
  </div>
</div>

<div class="remote-list">
  <h2>予約履歴一覧</h2>
  <table>
    @foreach ($list as $list)
    <div class="list-column">
      <tr>
        <td>予約種類</td>
        <td>開始日時</td>
        <td>終了日時</td>
        <td>予約時間</td>
      </tr>
    </div>
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
