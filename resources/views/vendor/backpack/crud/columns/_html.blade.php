{{-- custom html --}}
@php

   // $column['escaped'] = $column['escaped'] ?? false;
    //$column['prefix'] = $column['prefix'] ?? '';
    //$column['suffix'] = $column['suffix'] ?? '';
    $value = data_get($entry, $column['name']);

    //if($column['value'] instanceof \Closure) {
      //  $column['value'] = $column['value']($entry);
    //}
    //if(!empty($column['value'])) {
//        $column['text'] = $column['prefix'].$column['value'].$column['suffix'];
  //  }
    dump($column);
@endphp
<span>
{{$value}}
</span>
{{--<span>--}}
{{--    @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')--}}
{{--        @if(isset($column['text']))--}}
{{--        {{ $column['text'] }}--}}
{{--            @if($column['escaped'])--}}
{{--                {{ $column['text'] }}--}}
{{--            @else--}}
{{--                {!! $column['text'] !!}--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')--}}
{{--</span>--}}
