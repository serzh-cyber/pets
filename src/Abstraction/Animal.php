<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:00
 */

namespace App\Abstraction;

use App\Interfacing\IAnimal;
use App\Box;
use App\Feed;

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
     * @var int Текущая сытость животного
     */
    protected $satiety = 0;

    /**
     * @var int Лимит сытости
     */
    protected $satietyMax = 0;

    /**
     * @var string Площадь которую занимает это животное
     */
    protected $square = '';

    /**
     * Статус в коробке - 1, не в коробке - 0
     * @var int
     */
    protected $inBox = 0;

    /**
     * Animal constructor.
     * @param $name
     * @param $age
     * @param $gender
     * @param $color
     * @param $breed
     * @param $satiety
     * @param $satietyMax
     * @param $square
     */
    public function __construct($name, $age, $gender, $color, $breed, $satiety, $satietyMax, $square)
    {
        $this->name         = $name;
        $this->age          = $age;
        $this->gender       = $gender;
        $this->color        = $color;
        $this->breed        = $breed;
        $this->satiety      = $satiety;
        $this->satietyMax   = $satietyMax;
        $this->square       = $square;
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
     * Покормить питомца     *
     * @param Feed $feed Корм
     */
    public function eat(Feed $feed) :void
    {
        $f              = rand(0, $feed->getFeed($this));
        $this->satiety  = $this->satiety+$f;
    }

    /**
     * Проверка на сытость
     */
    public function isHungry(): bool
    {
        if ($this->satiety+20 >= $this->satietyMax) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Команда туалет     *
     * @param Box $box коробка в которую пойдут в туалет
     */
    public function toilet(Box $box = null): void
    {
        if ($this->satiety+20 >= $this->satietyMax) {
            if ($this->inBox == 1) {
                $this->toiletInBox($box);
            } else {
                $this->toiletOutside();
            }
        }
    }

    /**
     * Команда туалет в коробку     *
     * @param Box $box коробка в которую пойдут в туалет
     */
    public function toiletInBox(Box $box): void
    {
        $this->satiety -= 50;
        $box->getBoxCrap()->setCrap($box->getBoxCrap()->getCrapInBox()+50);
    }

    /**
     * Команда туалет снаружи для тех кто не в коробке
     */
    public function toiletOutside(): void
    {
        $this->satiety -= 50;
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
    public function getInBox(): int
    {
        return $this->inBox;
    }

    /**
     * @param int $inBox
     */
    public function setInBox(int $inBox): void
    {
        $this->inBox = $inBox;
    }

    /**
     * @param int $inBox
     */
    public function setOutBox(int $inBox): void
    {
        $this->inBox = $inBox;
    }

    /**
     * @return int
     */
    public function getSatiety(): int
    {
        return $this->satiety;
    }

    /**
     * @return int
     */
    public function getSatietyMax(): int
    {
        return $this->satietyMax;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
