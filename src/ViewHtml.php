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
        echo '<head> <link href="/Assets/css/style.css" rel="stylesheet"> </head>'; // перенести это в отдельный класс все тэги
        echo '<body>';
        echo '<table class="p-c"><tr>';
        echo '<td><p class="p-1">' . nl2br($boxPresenter->showAmountPets()) . '</p></td>'; // перенести это в отдельный класс все тэги
        echo '<td><p class="p-1">' . nl2br($boxPresenter->showAdditionalPets()) . '</p></td>';
        echo '<td><p class="p-1">' . nl2br($boxPresenter->showAmountHungry()) . '</p></td></tr></table>';
        echo '<table class="p-c"><tr><td>' . '<p class="p-1_1">' . nl2br($boxPresenter->showClearRequired()) . '</p></td></tr></table>';
        echo '<table class="p-c"><tr><td><p class="p-2">' . nl2br($outBoxPresenter->showAmountPets()) . '</p></td>';
        echo '<td><p class="p-2">' . nl2br($outBoxPresenter->showAmountHungry()) . '</p></td>';
        echo '</tr></table>';
        echo '</body>';
    }
}
