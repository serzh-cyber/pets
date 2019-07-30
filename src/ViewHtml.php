<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.07.2019
 * Time: 12:46
 */

namespace App;

use App\Interfacing\View;

class ViewHtml implements View
{
    /**
     * Вывод в браузер
     *
     * @param $arr
     */
    public function viewer(array $arr)
    {
        echo nl2br($arr['requiredPets']['puppy'] ? "Из запрошенного количества собак - " . $arr['requiredPets']['count']['puppy'] . " - поместились все\n" : "Из запрошенных " . $arr['amount']['puppy_count'] . " - собак, поместилось - " . $arr['requiredPets']['count']['puppy'] . "\n");
        echo nl2br($arr['requiredPets']['kitty'] ? "Из запрошенного количества кошек - " . $arr['requiredPets']['count']['kitty'] . " - поместились все\n" : "Из запрошенных " . $arr['amount']['kitty_count'] . " - кошек, поместилось - " . $arr['requiredPets']['count']['kitty'] . "\n");
        echo nl2br(isset($arr['additionalCat']) ? "В коробке осталось не заполненное пространство, можно добавить " . $arr['additionalCat'] . " кошек" : "Коробка полностью заполнена.\n");
        echo nl2br(isset($arr['additionalDog']) ? " или " . $arr['additionalDog'] . " собак.\n" : "\n");

        echo nl2br("Животных в коробке: "   . $arr['petsInBox']         . "\n");
        echo nl2br('В коробке собак - '     . $arr['dogsInBox']         . ', кошек - '  . $arr['catsInBox']         . ".\n");
        echo nl2br("В коробке голодных: "   . $arr['hungryInBox']       . ", а сытых: " . $arr['fedInBox']          . ".\n");
        echo nl2br("Животных вне коробки: " . $arr['petsOutBox']        . "\n");
        echo nl2br('Вне коробки собак - '   . $arr['dogsOutBox']        . ', кошек - '  . $arr['catsOutBox']        . ".\n");
        echo nl2br("Вне коробки голодных: " . $arr['hungryOutBox']      . ", а сытых: " . $arr['fedOutBox']         . ".\n");
        echo nl2br($arr['clearNeed'] ? 'В коробке нужно прибраться.'    . "\n" : 'В коробке убираться не нужно.'    . "\n");
    }
}
