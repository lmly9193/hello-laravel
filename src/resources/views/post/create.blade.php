<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
  </head>

  <body>
    <h1>{{ $title }}</h1>

    {{-- {{Form::open(['url'=>'post', 'method'=>'post'])}}
    {{Form::label('title', '標題')}}<br>
    {{Form::text('title')}}<br>
    {{Form::label('content', '內容')}}<br>
    {{Form::textarea('content')}}<br>
    {{Form::submit('發表文章')}}
    {{Form::close()}} --}}

    <form action="{{url('post')}}" method="post">
      {{ csrf_field() }}
      <div>
        <label>標題</label>
        <input type="text" name="title">
      </div>
      <div>
        <label>內容</label>
        <textarea name="content" cols="30" rows="10"></textarea>
      </div>
      <button type="submit">發表文章</button>
    </form>
    @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </body>

</html>