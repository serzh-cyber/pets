<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:49
 */

namespace App\Interfacing;


interface IAmount
{
    /**
     * Получить входные данные
     *
     * @return array
     */
    public function getAmount(): array;
}