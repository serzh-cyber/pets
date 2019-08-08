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
     * @var int
     */
    protected static $crapLimit = 0;

    /**
     * @var array массив содержащий в себе объекты животных внутри коробки
     */
    protected $allPets = [];

    /**
     * @var int текущая площадь занятости коробки
     */
    protected $currentSpace = 0;

    /**
     * @var array экскременты животных из $allPets
     */
    protected $crapArray = [];

    /**
     * @var int площадь коробки
     */
    protected $square = 0;

    /**
     * Box constructor.
     * @param $square
     */
    public function __construct($square)
    {
        $this->square    = $square;
        self::$crapLimit = Config::get('crapLimit');
    }

    /**
     * Проверка вмещается ли животное в коробку
     * @param Animal $pet
     * @return bool
     */
    public function isPetFit(Animal $pet): bool
    {
        if ($pet->getSquare() + $this->currentSpace < $this->square) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Если есть место в коробке добавляет в массив объект $animal
     * @param Animal $pet
     * @return bool
     */
    public function addPet(Animal $pet): bool
    {
        if  ($this->isPetFit($pet)) {
            $this->allPets[]    = $pet;
            $this->currentSpace = $this->currentSpace + $pet->getSquare();

            $pet->setIsInBox(true);

            return true;
        } else {
            return false;
        }
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
     * Проверка вместительности коробки на кошек
     * @return bool
     */
    public function canAddKitty(): bool
    {
        if ($this->square - $this->currentSpace > 850) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Сколько еще кошек вместятся
     * @return int
     */
    public function amountAddKitty(): int
    {
        if ($this->canAddKitty()) {
            return floor(($this->square - $this->currentSpace)/850);
        } else {
            return 0;
        }
    }

    /**
     * Проверка вместительности коробки на собак
     * @return bool
     */
    public function canAddPuppy(): bool
    {
        if ($this->square - $this->currentSpace > 1200) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Сколько еще щенят вместятся
     * @return int
     */
    public function amountAddPuppy(): int
    {
        if ($this->canAddPuppy()) {
            return floor(($this->square - $this->currentSpace) / 1200);
        } else {
            return 0;
        }
    }

    /**
     * Подсчет голодных животных
     * @return int
     */
    public function countHungry(): int
    {
        $hungryCount  = 0;

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
     * Команда туалет для объектов в allPets
     */
    public function doToilet(): void
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
        return (array_sum(array_map(function (Crap $crap) {
                return $crap->getAmount();
            }, $this->crapArray)) >= self::$crapLimit);
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
