<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:38
 */

namespace App;

use App\Interfacing\IAmount;

class AmountCli implements IAmount
{
    /**
     * Получить входные данные для CLI     *
     * @return array
     */
    public function getAmount(): array
    {
        $longopts   = [
            "puppy_count:",
            "kitty_count:",
        ];
        $options    = getopt("", $longopts);

        if (!isset($options['puppy_count'])) {
            $options['puppy_count'] = 0;
        }
        if (!isset($options['kitty_count'])) {
            $options['kitty_count'] = 0;
        }
        return $options;
    }
}