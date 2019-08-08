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
     * @var array Наименования параметров
     */
    protected $parametersNames = [
        'puppy_count:',
        'kitty_count:',
        'box_square:'
    ];

    /**
     * @var array массив с переданными параметрами
     */
    protected $parameters = [];

    /**
     * @var int Заданное количество щенков
     */
    protected $puppyCount;

    /**
     * @var int Заданное количество котят
     */
    protected $kittyCount;

    /**
     * @var int Заданная площадь коробки
     */
    protected $boxSquare;

    /**
     * Получить входные данные для CLI
     */
    public function __construct()
    {
        $this->parameters = getopt("", $this->parametersNames);

        foreach ($this->parametersNames as $name) {
            $this->setParameter(mb_substr($name, 0, -1));
        }
    }

    /**
     * Присвоить свойству параметр
     * @param $key
     */
    public function setParameter($key): void
    {
        $propertyName = $this->getPropertyName($key);

        if (isset($this->parameters[$key]) && property_exists($this, $propertyName)) {
            $this->$propertyName = $this->parameters[$key];
        } elseif(property_exists($this, $propertyName)) {
            $this->$propertyName = Config::get($propertyName);
        }
    }

    /**
     * snake_case переписать в camelCase
     * @param $string
     * @return string
     */
    public function getPropertyName($string): string
    {
        $str    = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        $str[0] = strtolower($str[0]);

        return $str;
    }

    /**
     * @return int
     */
    public function getPuppyCount(): int
    {
        return $this->puppyCount;
    }

    /**
     * @return int
     */
    public function getKittyCount(): int
    {
        return $this->kittyCount;
    }

    /**
     * @return int
     */
    public function getBoxSquare(): int
    {
        return $this->boxSquare;
    }
}
