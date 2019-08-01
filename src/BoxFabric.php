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
    protected $color = ['Красная', 'Коричневая', 'Белая'];

    /**
     * Создание коробки
     * @param int $count
     * @return object
     */
    public static function create(int $count): object
    {
        $t = new BoxFabric();
        return new Box($count, $t->color[rand(0, count($t->color) - 1)]);
    }
}