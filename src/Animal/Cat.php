<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 14:46
 */

namespace App\Animal;

use App\Abstraction\Animal;

class Cat extends Animal
{
    /**
     * Команда голос
     */
    public function speak(): bool
    {
        return true;
    }

    /**
     * Команда ползать
     */
    public function crawl(): bool
    {
        return true;
    }
}
