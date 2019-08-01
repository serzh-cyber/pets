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
    protected $names    = ['Соба', 'Каспер', 'Горец', 'Клод', 'Клаус', 'Шерон', 'Буба', 'Леон'];

    /**
     * @var array пол собак
     */
    protected $gender   = ['male', 'female'];

    /**
     * @var array цвета шерсти собак
     */
    protected $color    = ['Зеленный', 'Алый', 'Сапфировый', 'Оранжевый', 'Черный', 'Белый'];

    /**
     * @var array породы собак
     */
    protected $breed    = ['Бульдог', 'Грейхаунд', 'Ретривер', 'Бигль', 'Немецкая овчарка', 'Пудель', 'Лабрадор'];

    /**
     * Создание массива из объектов щенков
     * @param int $count
     * @return array
     */
    public static function create(int $count): array
    {
        $dogs   = [];
        $t      = new PuppyFabric();

        for($i=0; $i<$count; $i++) {
            $dogs[] = new Dog($t->names[rand(0, count($t->names)-1)], rand(1, 4), $t->gender[rand(0, 1)], $t->color[rand(0, count($t->color)-1)], $t->breed[rand(0, count($t->breed)-1)], rand(50, 150), 300, rand(700, 1200));
        }

        return $dogs;
    }
}
