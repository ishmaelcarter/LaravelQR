@extends('layouts.app')

@section('content')
<div class="tweet-media">
  @foreach ($trendingUnique as $tweet)
    @if ($loop->iteration < 30)
      <div class="tweet-inner">
        <a class="" href="{{$tweet->url}}"><div style="background-image: url('{{$tweet->media}}')">{{$tweet->text}}</div></a>
      </div>
    @endif
  @endforeach
</div>
<div id="pagination">
  {{ $trending->links() }}
</div>
@endsection
