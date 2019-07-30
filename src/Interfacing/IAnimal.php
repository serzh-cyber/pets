<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:02
 */

namespace App\Interfacing;

use App\Box;
use App\Feed;

interface IAnimal
{
    /**
     * Голос
     *
     * void голос животного
     */
    public function speak(): bool;

    /**
     * Команда ползти
     *
     * void состояние на ползет
     */
    public function crawl(): bool;

    /**
     * Покормить питомца
     *
     * @param Feed $feed
     */
    public function eat(Feed $feed): void;

    /**
     * Команда туалет
     *
     * @param Box $box
     */
    public function toilet(Box $box = null): void;
}
