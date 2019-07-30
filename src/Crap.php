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
    protected $crapInBox = 0;

    /**
     * @return int
     */
    public function getCrapInBox(): int
    {
        return $this->crapInBox;
    }

    /**
     * @param mixed $crapInBox
     */
    public function setCrap($crapInBox): void
    {
        $this->crapInBox = $crapInBox;
    }
}
