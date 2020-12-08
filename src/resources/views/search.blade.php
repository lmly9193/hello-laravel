
<!-- this is a commennt -->
{{-- this is an other comment --}}

{{-- @{{I'm escape!}} --}}

<h1>You're looking for {{$item}} ?</h1>

{{-- PHP --}}
@php
  $records=[];
@endphp

{{-- Cond --}}
@if (count($records) === 1)
我有一條記錄！
@elseif (count($records) > 1)
我有多條記錄！
<ol>
@for ($i = 1; $i <= 10; $i++)
  <li>I'm {{$i}} {{$item}} Data!</li>
@endfor
</ol>
@else
我沒有任何記錄！
@endif
