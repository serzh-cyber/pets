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
    protected $names    = ['Снежок', 'Мотроскин', 'Клин', 'Котэ', 'Котъ', 'Сеня', 'Джоджо', 'Ранджа'];

    /**
     * @var array пол кошек
     */
    protected $gender   = ['male', 'female'];

    /**
     * @var array цвета шерсти кошек
     */
    protected $color    = ['Зеленный', 'Алый', 'Сапфировый', 'Оранжевый', 'Черный', 'Белый'];

    /**
     * @var array породы кошек
     */
    protected $breed    = ['Персидская', 'Мей-кун', 'Сиамская', 'Рэгдолл', 'Бенгальская', 'Абиссинская', 'Бирманская'];

    /**
     * Создание массива из объектов щенков
     * @param int $count
     * @return array
     */
    public static function create(int $count): array
    {
        $cats   = [];
        $t      = new KittyFabric();

        for($i=0; $i<$count; $i++) {
            $cats[] = new Cat($t->names[rand(0, count($t->names)-1)], rand(1, 4), $t->gender[rand(0, 1)], $t->color[rand(0, count($t->color)-1)], $t->breed[rand(0, count($t->breed)-1)], rand(50, 150), 300, rand(400, 850));
        }

        return $cats;
    }
}
