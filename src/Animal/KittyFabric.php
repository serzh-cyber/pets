<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.07.2019
 * Time: 15:35
 */

namespace App\Animal;


use App\Abstraction\PetsFactory;

class KittyFabric extends PetsFactory
{
    /**
     * @var array имена для кошек
     */
    protected static $names    = ['Снежок', 'Мотроскин', 'Клин', 'Котэ', 'Котъ', 'Сеня', 'Джоджо', 'Ранджа'];

    /**
     * @var array пол кошек
     */
    protected static $gender   = ['male', 'female'];

    /**
     * @var array цвета шерсти кошек
     */
    protected static $color    = ['Зеленный', 'Алый', 'Сапфировый', 'Оранжевый', 'Черный', 'Белый'];

    /**
     * @var array породы кошек
     */
    protected static $breed    = ['Персидская', 'Мей-кун', 'Сиамская', 'Рэгдолл', 'Бенгальская', 'Абиссинская', 'Бирманская'];

    /**
     * Создание массива из объектов щенков
     * @param int $count
     * @return array
     */
    public static function create(int $count): array
    {
        $cats   = [];

        for($i=0; $i<$count; $i++) {
            $cats[] = new Cat(self::$names[rand(0, count(self::$names)-1)], rand(1, 4), self::$gender[rand(0, 1)], self::$color[rand(0, count(self::$color)-1)], self::$breed[rand(0, count(self::$breed)-1)], rand(400, 850));
        }

        return $cats;
    }
}
