<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.08.2019
 * Time: 10:32
 */

namespace App;


class FoodFabric
{
    public static function create($count): array
    {
        $portions = [];

        for ($i=0; $i<$count; $i++) {
            $portions[] = new Portion(150);
        }

        return $portions;
    }
}