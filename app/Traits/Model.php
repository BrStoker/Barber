<?php

namespace App\Traits;

trait Model{

    public static $statuses = [
        0 => 'Заблокирован',
        1 => 'На модерации',
        2 => 'Активен'
    ];

    public static $gender = [
        0 => 'Не указано',
        1 => 'Мужской',
        2 => 'Женский'
    ];



}
