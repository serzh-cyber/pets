<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.07.2019
 * Time: 16:00
 */

namespace App;

class Inserter
{
    /**
     * Помещает животных в коробку, если не вмещаются, то помещает вне коробки
     * @param array $pets
     * @param Box $box
     * @param OutBox $outBox
     */
    public function insert(array $pets, Box $box, OutBox $outBox): void
    {
        foreach ($pets as $pet) {
            if (!$box->addPet($pet)) {
                $outBox->addPet($pet);
            }
        }
    }
}