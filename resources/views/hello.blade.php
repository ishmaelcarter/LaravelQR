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
  <div class="center">
      <button class="" id="keygen" onclick="keygen()">Generate QR Code</button>
      <form action="/transaction" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="">
        @if(Auth::user())
          <input type="hidden" id="user" name="user" value="{{ Auth::id() }}">
        @endif
        <input type="submit" id="save" value="Save QR Code" style="display:none;"></input>
      </form>
      <img src="" id="qrcode">
  </div>
</body>
</html>
@endsection
