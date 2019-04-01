@extends('layouts.app')

@section('content')
<div class="tweet-media">
  @foreach ($trendingUnique as $trending)
    @if ($loop->iteration > 40 && $loop->iteration < 80)
      <div class="tweet-inner">
        <div style="background-image: url('{{$trending->media}}')"><a class="" href="{{$trending->url}}">{{$trending->text}}</a></div>
      </div>
    @endif
  @endforeach
</div>
@endsection
