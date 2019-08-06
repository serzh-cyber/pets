<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.07.2019
 * Time: 11:36
 */

namespace App;

use App\Abstraction\Placement;
use App\Interfacing\IPlacementPresenter;

class BoxPresenter implements IPlacementPresenter
{
    /**
     * @var null объект класса Place
     */
    protected $box    = null;

    /**
     * BoxPresenter constructor.
     * @param Placement $box
     */
    public function __construct(Placement $box)
    {
        $this->box    = $box;
    }

    /**
     * Показать сколько каких животных
     * @return string
     */
    public function showAmountPets(): string
    {
        return 'Внутри коробки ' . ($this->box->countPets()['puppiesAmount']+$this->box->countPets()['kittiesAmount']) . ' животных.' . "\n" . 'Собак: ' . $this->box->countPets()['puppiesAmount'] . ', Кошек: ' . $this->box->countPets()['kittiesAmount'] . "\n";
    }

    /**
     * Показать сколько голодных сколько сытых животных
     * @return string
     */
    public function showAmountHungry(): string
    {
        return 'Внутри коробки голодных питомцев - ' . $this->box->countHungry()['countHungry'] . ', а сытых питомцев - ' . $this->box->countHungry()['countFed'] . "\n";
    }

    /**
     * Показать сколько еще животных могут поместиться
     * @return string
     */
    public function showAdditionalPets(): string
    {
        return 'В корбку могут поместиться: ' . $this->box->isSpaceFree()['additionalPuppies'] . ' - собаки, или ' . $this->box->isSpaceFree()['additionalKitties'] . ' - кошки.' . "\n";
    }

    /**
     * Показывает, что убраться нужно или нет.
     * @return string
     */
    public function showClearRequired():string
    {
        return $this->box->clearRequired() ? 'В коробке пора убраться.' . "\n" : 'В коробке убираться не требуется.' . "\n";
    }
}
