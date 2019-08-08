<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 10:27
 */

namespace App\Interfacing;

interface IView
{
    /**
     * Логика вывода
     * @param IPlacementPresenter $boxPresenter
     * @param IPlacementPresenter $outBoxPresenter
     */
    public function viewer(IPlacementPresenter $boxPresenter, IPlacementPresenter $outBoxPresenter): void;
}