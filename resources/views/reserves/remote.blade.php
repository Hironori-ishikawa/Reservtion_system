@extends('layouts.app')

@section('content')
<div class="remote-form">
  <h1>ここはリモート予約のフォーム</h1>
  <div class="form-group">
    <form action="" method="get">
      <input type="date" name="date" value="2020/01/01">
      <div class="reserve-botton">
        <button type="submit" class="btn btn-success pull-right">送信
      </div>
    </form>
  </div>
</div>
@endsection
