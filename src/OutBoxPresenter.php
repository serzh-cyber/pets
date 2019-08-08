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
    protected $outBox = null;

    /**
     * BoxPresenter constructor.
     * @param Placement $outBox
     */
    public function __construct(Placement $outBox)
    {
        $this->outBox = $outBox;
    }

    /**
     * Показать сколько каких животных
     * @return string
     */
    public function showAmountPets():string
    {
        return 'Снаружи коробки ' . $this->outBox->getPetsCount() . ' животных.' . "\n" . 'Собак: ' . $this->outBox->getPuppyCount() . ', Кошек: ' . $this->outBox->getKittyCount() . "\n";
    }

    /**
     * Показать сколько голодных сколько сытых животных
     * @return string
     */
    public function showAmountHungry(): string
    {
        return 'Снаружи коробки голодных питомцев - ' . $this->outBox->countHungry() . ', а сытых питомцев - ' . $this->outBox->countFed() . "\n";
    }
}
