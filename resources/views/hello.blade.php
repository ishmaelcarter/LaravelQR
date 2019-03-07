<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <title>Qcommerce</title>
    </head>
<body>
  <div>
    <a href="/transaction">Create New QR Code</a>
  </div>
  @if(Auth::guest())
             <a href="/login" class="btn btn-info"> You need to login to see all QRs >></a>
           @endif
</body>
</html>
