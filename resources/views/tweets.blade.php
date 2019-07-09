@extends('layouts.app')

@section('content')
<div class="tweet-media">
  @foreach ($trending as $tweet)
      <div class="tweet-inner">
        <a class="" href="{{$tweet->url}}" alt="{{$tweet->text}}"><div style="background-image: url('{{$tweet->media}}')"></div></a>
      </div>
  @endforeach
</div>
<div id="pagination">
  {{ $trending->links() }}
</div>
@endsection
