<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.07.2019
 * Time: 14:29
 */

namespace App\Abstraction;

abstract class PetsFactory
{
    /**
     * Создание животного
     * @param int $count
     * @return array
     */
    abstract static function create(int $count): array;
}
