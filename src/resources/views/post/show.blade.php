<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
  </head>

  <body>
    @if (isset($post))
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    @endif

    <a href="{{ url()->previous() }}">回上一頁</a>
  </body>

</html>