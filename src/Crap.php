<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.07.2019
 * Time: 9:34
 */

namespace App;

class Crap
{
    /**
     * @var int количество экскрементов
     */
    protected $amount = 0;

    /**
     * Crap constructor.
     * @param $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
