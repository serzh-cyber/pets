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
    public function showAmountPets(): string
    {
        return 'Внутри коробки ' . ($this->place->countPets()['puppiesAmount']+$this->place->countPets()['kittiesAmount']) . ' животных.' . "\n" . 'Собак: ' . $this->place->countPets()['puppiesAmount'] . ', Кошек: ' . $this->place->countPets()['kittiesAmount'] . "\n";
    }

    /**
     * Показать сколько голодных сколько сытых животных
     * @return string
     */
    public function showAmountHungry(): string
    {
        return 'Внутри коробки голодных питомцев - ' . $this->place->countHungry()['countHungry'] . ', а сытых питомцев - ' . $this->place->countHungry()['countFed'] . "\n";
    }

    /**
     * Показать сколько еще животных могут поместиться
     * @return string
     */
    public function showAdditionalPets(): string
    {
        return 'В корбку могут поместиться: ' . $this->place->isSpaceFree()['additionalPuppies'] . ' - собаки, или ' . $this->place->isSpaceFree()['additionalKitties'] . ' - кошки.' . "\n";
    }

    /**
     * Надо ли убраться
     * @return bool
     */
    public function isClearRequired(): bool
    {
        return $this->place->clearRequired();
    }

    /**
     * Показывает, что убраться нужно или нет.
     * @return array
     */
    public function showClearRequired():array
    {
        return [
            'yes' => 'В коробке пора убраться.' . "\n",
            'no' => 'В коробке убираться не требуется.' . "\n"
        ];
    }
}
