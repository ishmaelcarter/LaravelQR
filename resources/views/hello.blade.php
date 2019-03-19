@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <title>Qcommerce</title>
    </head>
<body>
  <div class="center" id="keygen" onclick="keygen()">
      <button class="">Generate Unique Key</button>
    </div>
    <div class="center">
      <form action="/transaction" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="">
        @if(Auth::user())
          <input type="hidden" id="user" name="user" value="{{ Auth::id() }}">
          <input id="save" style="display:none;"type="submit" value="Save to Dashboard"></input>
        @endif
      </form>
      <img src="" id="qrcode">
      @if(!Auth::user())
        <p>Login or register to save generated keys to your dashboard.</p>
      @endif
  </div>
</body>
</html>
@endsection
