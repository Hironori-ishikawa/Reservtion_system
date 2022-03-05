@extends('layouts.app')

@section('content')
<div class="reserve-form">
  <h1>ここはオフィス来社予約のフォーム</h1>
  <div class="form-group">
    <form action="/reserve" method="post">
      @csrf
      <select name="reserve_id">
        <option selected value="1">オフィス来社予約</option>
      </select>
      <div class="start">
        <input type="date" name="start_date" value="2022-01-01">
        <input type="time" name="start_time" value="10:00">
      </div>
      <div class="end">
        <input type="date" name="end_date" value="2022-01-01">
        <input type="time" name="end_time" value="12:00">
      </div>

       <!-- 完了メッセージ -->
    @if (session('result'))
        <div style="color:green;">
            {{ session('result') }}
        </div>
        <br>
    @endif

    <!-- 省略 -->

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

      <div class="reserve-botton">
        <button type="submit">予約する</button>
      </div>


    </form>
  </div>
</div>

@endsection
