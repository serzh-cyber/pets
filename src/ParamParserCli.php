<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:38
 */

namespace App;

use App\Interfacing\IParamParser;

class ParamParserCli implements IParamParser
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
     * Получить входные данные для CLI     *
     */
    public function __construct()
    {
        $longopts = [
            "puppy_count:",
            "kitty_count:",
            "box_square:"
        ];
        $parameters             = getopt("", $longopts);

        if (!isset($parameters['puppy_count'])) {
            $this->puppyAmount  = 0;
        } else {
            $this->puppyAmount  = $parameters['puppy_count'];
        }
        if (!isset($parameters['kitty_count'])) {
            $this->kittyAmount  = 0;
        } else {
            $this->kittyAmount  = $parameters['kitty_count'];
        }
        if (!isset($parameters['box_square'])) {
            $this->boxSquare    = 10000;
        } else {
            $this->boxSquare    = $parameters['box_square'];
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
