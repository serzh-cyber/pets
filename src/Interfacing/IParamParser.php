<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:49
 */

namespace App\Interfacing;


interface IParamParser
{
    /**
     * Получить входные данные
     * @return array
     */
    public function __construct();

    /**
     * @return int Количество щенков
     */
    public function getPuppyAmount(): int;

    /**
     * @return int Количество кошек
     */
    public function getKittyAmount(): int;

    /**
     * @return int Площадь коробки
     */
    public function getBoxSquare():int;

}