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

    public static $settingStatuses =[
        0 => 'Не активно',
        1 => 'Активно'
    ];

    public static function arrayForSelect($callback = NULL, $where = []) {

        $arResult = [];

        $result;

        if(is_array($where) == true && empty($where) == false) {

            $query = NULL;

            foreach($where as $index => $item) {
                if($query == NULL) {
                    $query = self::where($index, $item);
                } else {
                    $query->where($index, $item);
                }
            }

            if($query){
                $result = $query->get();
            }

        } else {
            $result = self::all();
        }

        if(empty($result) == false)
        {
            foreach($result as $item)
            {
                if($callback <> NULL) {

                    $items = $callback($item);

                    if(isset($items) == true && empty($items) == false) {
                        foreach($items as $index => $item) {
                            $arResult[$index] = $item;
                        }
                    }

                } else {

                    $arResult[$item->id] = $item->value;

                }

            }
        }

        return $arResult;

    }


}
