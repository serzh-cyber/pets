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
    protected $outBox    = null;

    /**
     * BoxPresenter constructor.
     * @param Placement $outBox
     */
    public function __construct(Placement $outBox)
    {
        $this->outBox    = $outBox;
    }

    /**
     * Показать сколько каких животных
     * @return string
     */
    public function showAmountPets():string
    {
        return 'Снаружи коробки ' . ($this->outBox->countPets()['puppiesAmount']+$this->outBox->countPets()['kittiesAmount']) . ' животных.' . "\n" . 'Собак: ' . $this->outBox->countPets()['puppiesAmount'] . ', Кошек: ' . $this->outBox->countPets()['kittiesAmount'] . "\n";
    }

    /**
     * Показать сколько голодных сколько сытых животных
     * @return string
     */
    public function showAmountHungry(): string
    {
        return 'Снаружи коробки голодных питомцев - ' . $this->outBox->countHungry()['countHungry'] . ', а сытых питомцев - ' . $this->outBox->countHungry()['countFed'] . "\n";
    }
}