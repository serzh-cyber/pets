<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.07.2019
 * Time: 9:34
 */

namespace App;

use App\Abstraction\Animal;

class Feed
{
    /**
     * Количество корма для животного     *
     * @param Animal $animal
     * @return int
     */
    public function getFeed(Animal $animal): int
    {
        return $animal->getSatietyMax() - $animal->getSatiety() + 40;
    }
}
