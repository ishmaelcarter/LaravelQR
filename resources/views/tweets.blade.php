@extends('layouts.app')

@section('content')
<div class="tweet-media">
  @foreach ($trendingUnique as $trending)
    @if ($loop->iteration < 30)
      <div class="tweet-inner">
        <a class="" href="{{$trending->url}}"><div style="background-image: url('{{$trending->media}}')">{{$trending->text}}</div></a>
      </div>
    @endif
  @endforeach
</div>
@endsection
