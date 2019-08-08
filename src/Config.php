<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.08.2019
 * Time: 15:05
 */

namespace App;


class Config
{
    public static function get($key)
    {
        $configurations = [
            'age' => rand(1,5),
            'gender' => ['male', 'female'],
            'color' => ['Зеленный', 'Алый', 'Сапфировый', 'Оранжевый', 'Черный', 'Белый'],
            'kittyNames' => ['Снежок', 'Мотроскин', 'Клин', 'Котэ', 'Котъ', 'Сеня', 'Джоджо', 'Ранджа'],
            'kittyBreeds' => ['Персидская', 'Мей-кун', 'Сиамская', 'Рэгдолл', 'Бенгальская', 'Абиссинская', 'Бирманская'],
            'kittySquare' => rand(400, 850),
            'puppyNames' => ['Соба', 'Каспер', 'Горец', 'Клод', 'Клаус', 'Шерон', 'Буба', 'Леон'],
            'puppyBreeds' =>  ['Бульдог', 'Грейхаунд', 'Ретривер', 'Бигль', 'Немецкая овчарка', 'Пудель', 'Лабрадор'],
            'puppySquare' => rand(700, 1200),
            'puppyCount' => 0,
            'kittyCount' => 0,
            'boxSquare' => 10000,
            'foodAmount' => 150,
            'crapLimit' => 500
        ];

        if (isset($configurations[$key])) {
            return $configurations[$key];
        } else {
            return null;
        }
    }
}