<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:02
 */

namespace App\Interfacing;

use App\Portion;

interface IAnimal
{
    /**
     * Голос
     * void голос животного
     */
    public function speak(): bool;

    /**
     * Команда ползти
     * void состояние на ползет
     */
    public function crawl(): bool;

    /**
     * Покормить питомца
     * @param Portion $portion
     */
    public function eat(Portion $portion): void;

    /**
     * Команда туалет
     */
    public function toilet(): array;
}
