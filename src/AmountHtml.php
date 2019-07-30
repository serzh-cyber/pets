<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:55
 */

namespace App;

use App\Interfacing\IAmount;

class AmountHtml implements IAmount
{
    /**
     * Получить входные данные для HTML     *
     * @return array
     */
    public function getAmount(): array
    {
        $amount = [];

        if (isset($_GET['puppy_count'])) {
            $amount['puppy_count'] = $_GET['puppy_count'];
        } else {
            $amount['puppy_count'] = 0;
        }
        if (isset($_GET['kitty_count'])) {
            $amount['kitty_count'] = $_GET['kitty_count'];
        } else {
            $amount['kitty_count'] = 0;
        }
        return $amount;
    }
}
