@extends('layouts/app')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="{{ asset('js/keygen.js') }}" defer></script>
        <title>Qcommerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            body {
  text-align: center;
  background: #f1f1f1;
}

.wrapper {
  padding-top:60px;
}

button.form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border-color: #ccc;
  box-shadow: 0 1px 0 #ccc;
  color: #555;
  vertical-align: top;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  box-sizing: border-box;
  cursor: pointer;
  display: inline-block;
  font-size: 13px;
  height: 28px;
  line-height: 26px;
  margin: 0;
  padding: 0 10px 1px;
  text-decoration: none;
  white-space: nowrap;
}

input.form-control {
  background-color: #fff;
  border: 1px solid #ddd;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
  color: #32373c;
  outline: 0 none;
  transition: border-color 50ms ease-in-out 0s;
  margin: 1px;
  padding: 3px 5px;
  border-radius: 0;
  font-size: 14px;
  font-family: inherit;
  font-weight: inherit;
  box-sizing: border-box;
  color: #444;
  font-family: "Open Sans",sans-serif;
  line-height: 1.4em;
  width: 310px;
}

img {
  display: block;
  width: 50%;
  margin: auto;
}
        </style>
    </head>
    <body>
        <div class="center" id="keygen" onclick="keygen()">
            <button class="">Generate Unique Key</button>
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
@stop
