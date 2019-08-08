<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:00
 */

namespace App\Abstraction;

use App\Crap;
use App\Interfacing\IAnimal;
use App\Portion;

abstract class Animal implements IAnimal
{
    /**
     * @var string Кличка животного
     */
    protected $name = '';

    /**
     * @var string Пол животного
     */
    protected $gender = '';

    /**
     * @var string Возраст животного
     */
    protected $age = '';

    /**
     * @var string Цвет шерсти животного
     */
    protected $color = '';

    /**
     * @var string Порода
     */
    protected $breed = '';

    /**
     * @var int Площадь которую занимает это животное
     */
    protected $square = 0;

    /**
     * @var array желудок
     */
    protected $stomach = [];

    /**
     * @var bool Находится ли животное в коробке
     */
    protected $isInBox = false;

    /**
     * Animal constructor.
     * @param $name
     * @param $age
     * @param $gender
     * @param $color
     * @param $breed
     * @param $square
     */
    public function __construct($name, $age, $gender, $color, $breed, $square)
    {
        $this->name    = $name;
        $this->age     = $age;
        $this->gender  = $gender;
        $this->color   = $color;
        $this->breed   = $breed;
        $this->square  = $square;
    }

    /**
     * Команда голос
     */
    abstract public function speak(): bool;

    /**
     * Команда ползать
     */
    abstract public function crawl(): bool;

    /**
     * Покормить питомца
     * @param Portion $portion
     */
    public function eat(Portion $portion): void
    {
        $this->stomach[] = $portion;
    }


    /**
     * Проверка на сытость
     */
    public function isHungry(): bool
    {
        if (count($this->stomach) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Производство экскрементов
     * @return array
     */
    public function toilet(): array
    {
        $petCrap = [];

        if (!$this->isHungry()) {
            while ($this->stomach) {
                $petCrap[] = new Crap(array_pop($this->stomach)->getAmount());
            }
        }

        return $petCrap;
    }

    /**
     * @return int
     */
    public function getSquare(): int
    {
        return $this->square;
    }

    /**
     * @return int
     */
    public function getIsInBox(): int
    {
        return $this->isInBox;
    }

    /**
     * @param bool $isInBox
     */
    public function setIsInBox(bool $isInBox): void
    {
        $this->isInBox = $isInBox;
    }
}
