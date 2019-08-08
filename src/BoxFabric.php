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
    /**
     * Создание коробки
     * @param int $count
     * @return object
     */
    public static function create(int $count): object
    {
        return new Box($count);
    }
}
