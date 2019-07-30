<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 16:50
 */

namespace App;

use App\Interfacing\View;

class ViewCli implements View
{
    /**
     * Вывод в cli     *
     * @param $arr
     */
    public function viewer(array $arr)
    {
        echo $arr['requiredPets']['puppy'] ? "Из запрошенного количества собак - " . $arr['requiredPets']['count']['puppy'] . " - поместились все\n" : "Из запрошенных " . $arr['amount']['puppy_count'] . " - собак, поместилось - " . $arr['requiredPets']['count']['puppy'] . "\n";
        echo $arr['requiredPets']['kitty'] ? "Из запрошенного количества кошек - " . $arr['requiredPets']['count']['kitty'] . " - поместились все\n" : "Из запрошенных " . $arr['amount']['kitty_count'] . " - кошек, поместилось - " . $arr['requiredPets']['count']['kitty'] . "\n";
        echo isset($arr['additionalCat']) ? "В коробке осталось не заполненное пространство, можно добавить " . $arr['additionalCat'] . " кошек" : "Коробка полностью заполнена.\n";
        echo isset($arr['additionalDog']) ? " или " . $arr['additionalDog'] . " собак.\n" : "\n";

        echo "Животных в коробке: "     . $arr['petsInBox']     . "\n";
        echo 'В коробке собак - '       . $arr['dogsInBox']     . ', кошек - '  . $arr['catsInBox']         . ".\n";
        echo "В коробке голодных: "     . $arr['hungryInBox']   . ", а сытых: " . $arr['fedInBox']          . ".\n";
        echo "Животных вне коробки: "   . $arr['petsOutBox']    . "\n";
        echo 'Вне коробки собак - '     . $arr['dogsOutBox']    . ', кошек - '  . $arr['catsOutBox']        . ".\n";
        echo "Вне коробки голодных: "   . $arr['hungryOutBox']  . ", а сытых: " . $arr['fedOutBox']         . ".\n";
        echo $arr['clearNeed'] ? 'В коробке нужно прибраться.'  . "\n" : 'В коробке убираться не нужно.'    . "\n";
    }
}
