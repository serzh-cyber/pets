<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.07.2019
 * Time: 15:35
 */

namespace App\Animal;

use App\Abstraction\PetsFactory;
use App\Config;

class KittyFabric extends PetsFactory
{
    /**
     * Создание массива из объектов щенков
     * @param int $count
     * @return array
     */
    public static function create(int $count): array
    {
        $cats = [];

        for($i=0; $i<$count; $i++) {
            $cats[] = new Cat(self::getName(), self::getAge(), self::getGender(), self::getColor(), self::getBreed(), self::getSquare());
        }

        return $cats;
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return Config::getInstance()->getConfig('kittyNames')[array_rand(Config::getInstance()->getConfig('kittyNames'))];
    }

    /**
     * @return string
     */
    public static function getGender(): string
    {
        return Config::getInstance()->getConfig('gender')[array_rand(Config::getInstance()->getConfig('gender'))];
    }

    /**
     * @return string
     */
    public static function getColor(): string
    {
        return Config::getInstance()->getConfig('color')[array_rand(Config::getInstance()->getConfig('color'))];
    }

    /**
     * @return string
     */
    public static function getBreed(): string
    {
        return Config::getInstance()->getConfig('kittyBreeds')[array_rand(Config::getInstance()->getConfig('kittyBreeds'))];
    }

    /**
     * @return int
     */
    public static function getAge(): int
    {
        return Config::getInstance()->getConfig('age');
    }

    /**
     * @return int
     */
    public static function getSquare(): int
    {
        return Config::getInstance()->getConfig('kittySquare');
    }
}
