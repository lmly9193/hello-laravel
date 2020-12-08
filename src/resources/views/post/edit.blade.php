<!doctype html>
<html lang="zh-Hant-TW">

  <head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
  </head>

  <body>
    <h1>{{ $title }}</h1>
    <form action="{{ route('update-post', ['id' => $post->id]) }}" method="post">
      <div>
        <label>標題</label>
        <input type="text" name="title" value="{{$post->title}}">
      </div>
      <div>
        <label>內容</label>
      <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea>
      </div>
      <button type="submit">送出修改</button>
      
      @method('PUT')
      @csrf
    </form>
    <form action="{{ route('delete-post', ['id' => $post->id]) }}" method="post">
      <button type="submit">刪除</button>
      @method('DELETE')
      @csrf
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

