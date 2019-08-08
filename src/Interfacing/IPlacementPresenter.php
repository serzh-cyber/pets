<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.08.2019
 * Time: 9:35
 */

namespace App\Interfacing;

use App\Abstraction\Placement;

interface IPlacementPresenter
{
    /**
     * IPlacementPresenter constructor.
     * @param Placement $place объект размещения, Box или OutBox
     */
    public function __construct(Placement $place);

    /**
     * Показать сколько животных имеется в объекте
     * @return string
     */
    public function showAmountPets(): string;

    /**
     * Показать сколько голодных и сытых животных в объекте
     * @return string
     */
    public function showAmountHungry(): string;
}