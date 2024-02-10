@extends(backpack_view('blank'))
@php


    $widgets['before_content'][] = [
    'type'    => 'div',
    'class'   => 'row',
    'content' => [
        [ 'type' => 'card', 'content' => ['body' => 'One'] ],
        [ 'type' => 'card', 'content' => ['body' => 'Two'] ],
        [ 'type' => 'card', 'content' => ['body' => 'Three'] ],
    ]
]


@endphp


@section('content')
@endsection
