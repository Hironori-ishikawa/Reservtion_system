@extends('layouts.layout_user')

@section('content')
<div class="main-form">
  <ul>
      <h1><label>予約方法を<br>選択してください</label></h1>
        <div class="reserve-button">
          <li><h2><a href="{{ route('reserves.reserve')}}">来社予約</a></h2></li>
        </div>
        <div class="remote-button">
          <li><h2><a href="{{ route('reserves.remote')}}">リモート予約</a></h2></li>
        </div>
  </ul>
</div>
@endsection
