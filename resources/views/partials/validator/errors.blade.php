@if (count($error) > 0)
 @php
  $str='';
  foreach ($error->all() as $err){
  $str.= $err;
  }
 @endphp
<strong>{!! $str !!}</strong>
@endif