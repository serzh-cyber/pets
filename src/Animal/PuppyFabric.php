<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.07.2019
 * Time: 14:56
 */

namespace App\Animal;


use App\Abstraction\PetsFactory;

class PuppyFabric extends PetsFactory
{
    /**
     * @var array имена для собак
     */
    protected static $names    = ['Соба', 'Каспер', 'Горец', 'Клод', 'Клаус', 'Шерон', 'Буба', 'Леон'];

    /**
     * @var array пол собак
     */
    protected static $gender   = ['male', 'female'];

    /**
     * @var array цвета шерсти собак
     */
    protected static $color    = ['Зеленный', 'Алый', 'Сапфировый', 'Оранжевый', 'Черный', 'Белый'];

    /**
     * @var array породы собак
     */
    protected static $breed    = ['Бульдог', 'Грейхаунд', 'Ретривер', 'Бигль', 'Немецкая овчарка', 'Пудель', 'Лабрадор'];

    /**
     * Создание массива из объектов щенков
     * @param int $count
     * @return array
     */
    public static function create(int $count): array
    {
        $dogs   = [];

        for($i=0; $i<$count; $i++) {
            $dogs[] = new Dog(self::$names[rand(0, count(self::$names)-1)], rand(1, 4), self::$gender[rand(0, 1)], self::$color[rand(0, count(self::$color)-1)], self::$breed[rand(0, count(self::$breed)-1)], rand(700, 1200));
        }

        return $dogs;
    }
}
