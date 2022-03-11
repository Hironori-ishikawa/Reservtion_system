@extends('layouts.layout_user')

@section('content')
<div class='main-form'>
  <ul>
      <h1><label>予約方法を選択してください</label></h1>
      <li><a href="{{ route('reserves.reserve')}}">来社予約</a></li>
      <li><a href="{{ route('reserves.remote')}}">リモート予約</a></li>
  </ul>
</div>
@endsection
