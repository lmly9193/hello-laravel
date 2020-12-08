<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
  </head>

  <body>
    <h1>{{ $title }}</h1>
    <div>
      <a href="{{url('post/create')}}">新增</a>
    @if (isset($posts))
    <ol>
      @foreach ($posts as $post)
      <li><a href="{{ route('show-post', ['id' => $post->id]) }}">{{$post->title}}</a> (<a href="{{ route('edit-post', ['id' => $post->id]) }}">編輯</a>)</li>
      @endforeach
    </ol>
    @endif
  </body>

</html>