<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.07.2019
 * Time: 17:20
 */

namespace App;

class BoxFabric
{
    static protected $color = ['Красная', 'Коричневая', 'Белая'];

    /**
     * Создание коробки
     * @param int $count
     * @return object
     */
    public static function create(int $count): object
    {
        return new Box($count, self::$color[rand(0, count(self::$color) - 1)]);
    }
}