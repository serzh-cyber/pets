<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.07.2019
 * Time: 11:16
 */

namespace App;

use App\Abstraction\Animal;
use App\Abstraction\Placement;
use App\Animal\Cat;
use App\Animal\Dog;

class Box extends Placement
{
    /**
     * Максимально положенное количество экскрементов в коробке
     */
    const CRAP_LIMIT            = 300;

    /**
     * @var string цвет коробки
     */
    protected $color            = '';

    /**
     * @var array массив содержащий в себе объекты животных внутри коробки
     */
    protected $allPets     = [];

    /**
     * @var int текущая площадь занятости коробки
     */
    public $currentSpace        = 0;

    /**
     * @var array экскременты животных из $allPets
     */
    protected $crapArray          = [];

    /**
     * @var int площадь коробки
     */
    protected $square           = 0;

    /**
     * Box constructor.
     * @param $square
     * @param $color
     */
    public function __construct($square, $color)
    {
        $this->square   = $square;
        $this->color    = $color;
    }

    /**
     * Проверяет есть ли свободное место, если есть добавляет в массив объект $animal
     * @param Animal $pet
     * @return bool
     */
    public function addPet(Animal $pet): bool
    {
        if  ($pet->getSquare()+$this->currentSpace < $this->square) {
            $this->allPets[]   = $pet;
            $this->currentSpace     = $this->currentSpace + $pet->getSquare();
            $pet->setIsInBox(true);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    public function countPets(): array
    {
        $petsCounts['puppiesAmount']   = 0;
        $petsCounts['kittiesAmount']    = 0;

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
     * Проверка вместимости дополнительных животных в коробку
     * @return array
     */
    public function isSpaceFree(): array
    {
        if ($this->square - $this->currentSpace > 850) {
            $additional['additionalKitties']        = floor(($this->square - $this->currentSpace)/850);

            if ($this->square - $this->currentSpace > 1200) {
                $additional['additionalPuppies']    = floor(($this->square - $this->currentSpace)/1200);
            }

            return $additional;
        } else {
            return $additional = [
                'additionalKitties' => 0,
                'additionalPuppies' => 0
            ];
        }
    }


    /**
     * Вытаскивает животного из коробки
     * @param Animal $animal
     * @param Placement $outBox
     * @return bool
     */
    public function inBoxToOutBox(Animal $animal, Placement $outBox): bool
    {
        foreach ($this->allPets as $key => $pet) {
            if ($pet == $animal) {
                unset($this->allPets[$key]);

                $outBox->allPets[] = $pet;

                $animal->setIsInBox(false);
                $this->freeSpace($animal);

                return true;
            }
        }

        return false;
    }

    /**
     * Освобождает площадь
     * @param Animal $animal
     */
    protected function freeSpace(Animal $animal): void
    {
        $this->currentSpace = $this->currentSpace-$animal->getSquare();
    }

    /**
     * Подсчет голодных и сытых животных
     * @return array
     */
    public function countHungry(): array
    {
        $petsCounts['countHungry'] = 0;
        $petsCounts['countFed'] = 0;
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
     * Команда туалет для объектов в allPets
     */
    public function doToilet()
    {
        foreach ($this->allPets as $pet) {
            $this->crapArray = array_merge($this->crapArray, $pet->toilet());
        }
    }

    /**
     * Проверка на необходимость уборки в коробке
     * @return bool
     */
    public function clearRequired(): bool
    {
        if (array_sum(array_map(function ($crap) {
                return $crap->getAmount();
            }, $this->crapArray)) >= self::CRAP_LIMIT) {

            return true;
        } else {
            return false;
        }
    }

    /**
     * Очищение коробки от экскрементов
     */
    public function clearCrap():void
    {
        $this->crapArray = [];
    }

    /**
     * @return array
     */
    public function getCrapArray(): array
    {
        return $this->crapArray;
    }

    /**
     * @return int
     */
    public function getSquare(): int
    {
        return $this->square;
    }

    /**
     * @return array
     */
    public function getAllPets(): array
    {
        return $this->allPets;
    }
}
