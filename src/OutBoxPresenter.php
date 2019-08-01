<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.08.2019
 * Time: 10:11
 */

namespace App;


use App\Abstraction\Placement;
use App\Interfacing\IPlacementPresenter;

class OutBoxPresenter implements IPlacementPresenter
{
    /**
     * @var null объект класса Place
     */
    protected $place    = null;

    /**
     * BoxPresenter constructor.
     * @param Placement $place
     */
    public function __construct(Placement $place)
    {
        $this->place    = $place;
    }

    /**
     * Показать сколько каких животных
     * @return string
     */
    public function showAmountPets():string
    {
        return 'Снаружи коробки ' . ($this->place->countPets()['puppiesAmount']+$this->place->countPets()['kittiesAmount']) . ' животных.' . "\n" . 'Собак: ' . $this->place->countPets()['puppiesAmount'] . ', Кошек: ' . $this->place->countPets()['kittiesAmount'] . "\n";
    }

    /**
     * Показать сколько голодных сколько сытых животных
     * @return string
     */
    public function showAmountHungry(): string
    {
        return 'Снаружи коробки голодных питомцев - ' . $this->place->countHungry()['countHungry'] . ', а сытых питомцев - ' . $this->place->countHungry()['countFed'] . "\n";
    }
}