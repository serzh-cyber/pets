<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:55
 */

namespace App;

use App\Interfacing\IParamParser;

class ParamParserHtml implements IParamParser
{
    /**
     * @var int Заданное количество щенков
     */
    protected $puppyAmount  = 0;

    /**
     * @var int Заданное количество котят
     */
    protected $kittyAmount  = 0;

    /**
     * @var int Заданная площадь коробки
     */
    protected $boxSquare    = 0;

    /**
     * Получить входные данные для HTML
     */
    public function __construct()
    {
        if (isset($_GET['puppy_count'])) {
            $this->puppyAmount = $_GET['puppy_count'];
        } else {
            $this->puppyAmount = 0;
        }
        if (isset($_GET['kitty_count'])) {
            $this->kittyAmount = $_GET['kitty_count'];
        } else {
            $this->kittyAmount = 0;
        }
        if (isset($_GET['box_square'])) {
            $this->boxSquare = $_GET['box_square'];
        } else {
            $this->boxSquare = 10000;
        }
    }

    /**
     * @return int
     */
    public function getPuppyAmount(): int
    {
        return $this->puppyAmount;
    }

    /**
     * @return int
     */
    public function getKittyAmount(): int
    {
        return $this->kittyAmount;
    }

    /**
     * @return int
     */
    public function getBoxSquare(): int
    {
        return $this->boxSquare;
    }
}
