<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.07.2019
 * Time: 15:57
 */

namespace App;


use App\Abstraction\Animal;
use App\Abstraction\Placement;
use App\Animal\Cat;
use App\Animal\Dog;

class OutBox extends Placement
{
    /**
     * @var array Все животные вне коробки
     */
    protected $allPets = [];

    /**
     * Добавляет не поместившихся в коробку животных
     * @param Animal $pet
     */
    public function addPet(Animal $pet): void
    {
        $this->allPets[] = $pet;
        $pet->setIsInBox(false);
    }

    /**
     * Подсчет количества питомацев
     * @return array
     */
    public function countPets(): array
    {
        $petsCounts['puppiesAmount']   = 0;
        $petsCounts['kittiesAmount']   = 0;

        foreach ($this->allPets as $pet) {
            if (is_a($pet, Dog::class)) {
                $petsCounts['puppiesAmount']++;
            } elseif (is_a($pet, Cat::class)) {
                $petsCounts['kittiesAmount']++;
            }
        }

        return $petsCounts;
    }

    /**
     * Покормить животных
     * @param $feed
     */
    public function feedPets($feed): void
    {
        foreach ($this->allPets as $pet) {
            $pet->eat($feed);
        }
    }

    /**
     * Подсчет голодных и сытых животных
     * @return array
     */
    public function countHungry():array
    {
        $petsCounts['countHungry']  = 0;
        $petsCounts['countFed']     = 0;

        foreach ($this->allPets as $pet) {
            if ($pet->isHungry()) {
                $petsCounts['countHungry']++;
            } else {
                $petsCounts['countFed']++;
            }
        }

        return $petsCounts;
    }

    /**
     * Туалет для животных вне коробки
     */
    public function toiletPets(): void
    {
        foreach (array_merge($this->allPets, $this->allPets) as $pet) {
            $pet->toilet();
        }
    }

    /**
     * @return array
     */
    public function getAllPets(): array
    {
        return $this->allPets;
    }
}