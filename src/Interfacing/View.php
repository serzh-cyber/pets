<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 10:27
 */

namespace App\Interfacing;


interface View
{
    /**
     *Логика вывода
     *
     * @param array $arr
     * @return mixed
     */
    public function viewer(array $arr) ;
}