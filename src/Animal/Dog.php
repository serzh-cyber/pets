<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 14:49
 */

namespace App\Animal;

use App\Abstraction\Animal;

class Dog extends Animal
{
    /**
     * Команда голос
     */
    public function speak(): bool
    {
        return 'Гав, Гав' . "\n";
    }

    /**
     * Команда ползать
     */
    public function crawl(): bool
    {
        return 'ПОЛЗУ, ПОЛЗУ' . "\n";
    }
}
