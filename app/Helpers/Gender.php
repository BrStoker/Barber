<?php


namespace App\Helpers;


class Gender
{
    public static function convertToGenderId($gender): ?int
    {
        $sexes = [
            1 => 1,
            'male' => 1,
            'man' => 1,
            'men' => 1,
            'boy' => 1,
            'м' => 1,
            'муж' => 1,
            'мужской' => 1,
            'мужчина' => 1,
            'мальчики' => 1,
            'мальчик' => 1,
            'юн' => 1,
            'юн.' => 1,
            'юнош' => 1,
            'юноша' => 1,
            'юноши' => 1,

            'l' => 2,
            2 => 2,
            'w' => 2,
            'female' => 2,
            'woman' => 2,
            'women' => 2,
            'girl' => 2,
            'ж' => 2,
            'жен' => 2,
            'женский' => 2,
            'женщина' => 2,
            'дев' => 2,
            'девуш' => 2,
            'девушка' => 2,
            'девушки' => 2,
            'девочки' => 2,
            'девочка' => 2,
        ];

        return $sexes[$gender] ?? null;
    }

    public function getGenders(){

    }
}