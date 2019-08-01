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
     * Покормить добавленных животных
     * @param $feed
     */
    abstract public function feedPets($feed): void;

    /**
     * Команда туалет для добавленных животных
     */
    abstract public function toiletPets(): void;

    /**
     * Подсчет добавленных животных
     * @return array
     */
    abstract public function countPets(): array;

    /**
     * Подсчет голодных и сытых добавленных животных
     * @return array
     */
    abstract public function countHungry(): array;
}