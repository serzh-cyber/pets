<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 16:50
 */

namespace App;

use App\Interfacing\IPlacementPresenter;
use App\Interfacing\IView;

class ViewCli implements IView
{
    /**
     * Вывод в cli
     * @param IPlacementPresenter $boxPresenter
     * @param IPlacementPresenter $outBoxPresenter
     */
    public function viewer(IPlacementPresenter $boxPresenter, IPlacementPresenter $outBoxPresenter): void
    {
        echo $boxPresenter->showAmountPets();
        echo $boxPresenter->showAdditionalPets();
        echo $boxPresenter->showAmountHungry();
        echo $boxPresenter->isClearRequired() ? $boxPresenter->showClearRequired()['yes'] : $boxPresenter->showClearRequired()['no'];
        echo $outBoxPresenter->showAmountPets();
        echo $outBoxPresenter->showAmountHungry();
    }
}
