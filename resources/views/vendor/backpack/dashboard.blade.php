@extends(backpack_view('blank'))
@php


    $widgets['before_content'][] = [
    'type'    => 'div',
    'class'   => 'row',
    'content' => [
        [
            'type'  => 'progress',
            'class'       => 'card text-white bg-success mb-2',
            'value' => \App\Models\User::whereBetween('created_at', [today()->subDays(7), today()])->get()->count(),
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count() . ' всего пользователей'

        ],
        [ 'type' => 'card', 'content' => ['body' => 'Two'] ],
        [ 'type' => 'card', 'content' => ['body' => 'Three'] ],
    ]
]


@endphp


@section('content')
@endsection
