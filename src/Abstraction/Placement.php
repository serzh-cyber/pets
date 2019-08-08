<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.07.2019
 * Time: 15:25
 */

namespace App\Abstraction;

abstract class Placement
{
    /**
     * Добавить животного
     * @param Animal $pet
     * @return mixed
     */
    abstract public function addPet(Animal $pet);

    /**
     * Подсчет добавленных животных
     * @return int
     */
    abstract public function getPetsCount(): int;

    /**
     * Подсчет голодных и сытых добавленных животных
     * @return int
     */
    abstract public function countHungry(): int;
}
