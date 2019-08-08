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
     * @var array экскременты животных из $allPets
     */
    protected $crapArray = [];

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
     * Подсчет животных котят и щенят
     * @return int
     */
    public function getPetsCount(): int
    {
        return count($this->allPets);
    }

    /**
     * Счетчик
     * @param $class
     * @return int
     */
    public function counter($class): int
    {
        $count = 0;

        foreach ($this->allPets as $pet) {
            if (is_a($pet, $class)) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * Подсчет щенят
     * @return int
     */
    public function getPuppyCount(): int
    {
        return $this->counter(Dog::class);
    }

    /**
     * Подсчет котят
     * @return int
     */
    public function getKittyCount(): int
    {
        return $this->counter(Cat::class);
    }

    /**
     * Подсчет голодных животных
     * @return int
     */
    public function countHungry(): int
    {
        $hungryCount = 0;

        foreach ($this->allPets as $pet) {
            if ($pet->isHungry()) {
                $hungryCount++;
            }
        }

        return $hungryCount;
    }

    /**
     * Подсчет сытых животных
     * @return int
     */
    public function countFed(): int
    {
        return $this->getPetsCount() - $this->countHungry();
    }

    /**
     * Туалет для животных вне коробки
     */
    public function doToilet(): void
    {
        foreach ($this->allPets as $pet) {
            $this->crapArray = array_merge($this->crapArray, $pet->toilet());
        }
    }

    /**
     * Очищение место от экскрементов
     */
    public function clearCrap():void
    {
        $this->crapArray = [];
    }

    /**
     * @return array
     */
    public function getAllPets(): array
    {
        return $this->allPets;
    }
}
