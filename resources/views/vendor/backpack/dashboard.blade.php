@extends(backpack_view('blank'))
@php


    $widgets['before_content'][] = [
    'type'       => 'div',
    'class'   => 'row',
    'content' => [
        [
            'type'  => 'progress',
            'class'       => 'card text-white bg-success mb-2',
            'value' => \App\Models\User::whereBetween('created_at', [today()->subDays(7), today()])->get()->count(),
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count() . ' всего пользователей'

        ],
        [
            'type'  => 'progress_gender',
            'class'       => 'card text-white bg-warning mb-2',
            'value' => \App\Models\User::whereBetween('created_at', [today()->subDays(7), today()])->where('gender', 1)->get()->count() . ' парень',
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count() . ' всего пользователей'
        ],
        [
            'type'  => 'progress_gender',
            'class'       => 'card text-white bg-primary mb-2',
            'value' => \App\Models\User::whereBetween('created_at', [today()->subDays(7), today()])->where('gender', 2)->get()->count() . ' девушка',
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count() . ' всего пользователей'
        ],
        [
            'type'  => 'progress_gender',
            'class'       => 'card text-white bg-danger mb-2',
            'value' => \App\Models\User::whereBetween('created_at', [today()->subDays(7), today()])->where('gender', 0)->get()->count() . ' пол не указан',
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count() . ' всего пользователей'
        ],

    ]
]


@endphp


@section('content')
@endsection
