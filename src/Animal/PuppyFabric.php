<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.07.2019
 * Time: 14:56
 */

namespace App\Animal;


use App\Abstraction\PetsFactory;
use App\Config;

class PuppyFabric extends PetsFactory
{
    /**
     * Создание массива из объектов щенков
     * @param int $count
     * @return array
     */
    public static function create(int $count): array
    {
        $dogs = [];

        for($i=0; $i<$count; $i++) {
            $dogs[] = new Dog(self::getName(), self::getAge(), self::getGender(), self::getColor(), self::getBreed(), self::getSquare());
        }

        return $dogs;
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return Config::get('puppyNames')[array_rand(Config::get('puppyNames'))];
    }

    /**
     * @return string
     */
    public static function getGender(): string
    {
        return Config::get('gender')[array_rand(Config::get('gender'))];
    }

    /**
     * @return string
     */
    public static function getColor(): string
    {
        return Config::get('color')[array_rand(Config::get('color'))];
    }

    /**
     * @return string
     */
    public static function getBreed(): string
    {
        return Config::get('puppyBreeds')[array_rand(Config::get('puppyBreeds'))];
    }

    /**
     * @return int
     */
    public static function getAge(): int
    {
        return Config::get('age');
    }

    /**
     * @return int
     */
    public static function getSquare(): int
    {
        return Config::get('puppySquare');
    }
}
