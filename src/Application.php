<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 14:45
 */

namespace App;

use App\Animal\Cat;
use App\Animal\Dog;
use App\Interfacing\IAmount;
use App\Interfacing\View;

class Application
{
    /**
     * Выполнение логики     *
     * @param View $view
     * @param IAmount $amount
     * @return mixed
     */
    public function run(View $view, IAmount $amount)
    {
        $arrStr     = [];
        $animals    = [
            new Cat('Котэ', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Дог', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
            new Cat('Cot', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
            new Cat('Котастрофа', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Собак', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
            new Cat('Котопес', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Собадин', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
            new Cat('Кёт', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Жучка', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
            new Cat('Снежок', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Каспер', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
            new Cat('КисКис', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
            new Dog('Свен', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
        ];

        $box    = new Box('Red');
        $feed   = new Feed();

        $arrStr['amount'] = $amount->getAmount();
        $arrStr['requiredPets'] = $box->getPetInBox($animals, $arrStr['amount']);

        if ($box::SQUARE - $box->currentSpace > 850) {
            $arrStr['additionalCat'] = floor(($box::SQUARE - $box->currentSpace)/850);
            if ($box::SQUARE - $box->currentSpace > 1200) {
                $arrStr['additionalDog'] = floor(($box::SQUARE - $box->currentSpace)/1200);
            }
        }

        #$box->getPetOutOfBox($animals[3]);
        $countBoxDog            = 0;
        $countBoxCat            = 0;
        $countDog               = 0;
        $countCat               = 0;

        foreach ($animals as $pet) {
            if ($pet->getInBox() == 1) {
                if (get_class($pet) == Dog::class) {
                    $countBoxDog++;
                } else {
                    $countBoxCat++;
                }
            } else {
                if (get_class($pet) == Dog::class) {
                    $countDog++;
                } else {
                    $countCat++;
                }
            }
        }

        $arrStr['petsInBox']    = count($box->petInBox);
        $arrStr['dogsInBox']    = $countBoxDog;
        $arrStr['catsInBox']    = $countBoxCat;
        $countHungry            = 0;

        foreach ($animals as $pet) {
            if ($pet->getInBox() == 1) {
                $pet->eat($feed);
                if ($pet->isHungry()) {
                    $countHungry++;
                }
            }
        }

        $arrStr['hungryInBox']  = $countHungry;
        $arrStr['fedInBox']     = $countBoxCat+$countBoxDog-$countHungry;
        $countHungry            = 0;

        foreach ($animals as $pet) {
            if ($pet->getInBox() == 0) {
                $pet->eat($feed);
                if ($pet->isHungry()) {
                    $countHungry++;
                }
            }
        }

        $arrStr['petsOutBox']   = $countCat+$countDog;
        $arrStr['dogsOutBox']   = $countCat;
        $arrStr['catsOutBox']   = $countDog;
        $arrStr['hungryOutBox'] = $countHungry;
        $arrStr['fedOutBox']    = $countCat+$countDog-$countHungry;

        foreach ($animals as $pet) {
            $pet->toilet($box);
        }

        $arrStr['clearNeed']    = $box->clearRequired();

        return $view->viewer($arrStr);
    }
}
