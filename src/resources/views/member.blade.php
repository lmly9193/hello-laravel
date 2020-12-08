<form action="{{ url("/member/login") }}" method="post">
  {{ csrf_field() }}
  使用者:<input type="text" name="username">
  密碼:<input type="text" name="password">
  <button type="submit">登入</button>
</form>