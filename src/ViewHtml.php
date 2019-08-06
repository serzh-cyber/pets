<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.07.2019
 * Time: 12:46
 */

namespace App;

use App\Interfacing\IPlacementPresenter;
use App\Interfacing\IView;

class ViewHtml implements IView
{
    /**
     * Вывод в cli
     * @param IPlacementPresenter $boxPresenter
     * @param IPlacementPresenter $outBoxPresenter
     */
    public function viewer(IPlacementPresenter $boxPresenter, IPlacementPresenter $outBoxPresenter): void
    {
        echo nl2br($boxPresenter->showAmountPets());
        echo nl2br($boxPresenter->showAdditionalPets());
        echo nl2br($boxPresenter->showAmountHungry());
        echo nl2br($boxPresenter->showClearRequired());
        echo nl2br($outBoxPresenter->showAmountPets());
        echo nl2br($outBoxPresenter->showAmountHungry());
    }
}
