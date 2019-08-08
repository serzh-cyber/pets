<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.07.2019
 * Time: 9:34
 */

namespace App;

class Portion
{
    /**
     * @var int Масса еды в порции
     */
    protected $amount = 0;

    /**
     * Portion constructor.
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
