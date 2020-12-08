<!doctype html>
<html lang="zh-hant-tw">

  <head>
    <title>{{ $title }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <h1>{{ $title }}</h1>
    {{-- {{$lists->links()}} --}}
    <a href="{{url('list')}}">返回搜尋</a>
    <a href="{{$lists->previousPageUrl()}}">上一頁</a>
    @for ($i = 1; $i <= $lists->lastPage(); $i++)
      @if ($i==$lists->currentPage())
      {{$i}}
      @else
      <a href="{{$lists->url($i)}}">{{$i}}</a>
      @endif
      @endfor
      <a href="{{$lists->nextPageUrl()}}">下一頁</a>
      <table class="table">
        <thead>
          <tr>
            <td>ID</td>
            <td>姓名</td>
            <td>性別</td>
            <td>Email</td>
            <td>IP</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($lists as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->first_name}} {{$row->last_name}}</td>
            <td>{{$row->gender}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->ip_address}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- @if (isset($lists))
          <ol>
            @foreach ($lists as $row)
            <li>{{$row}}</li>
      @endforeach
      </ol>
      @endif --}}

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>