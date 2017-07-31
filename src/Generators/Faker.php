<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/28/2017
 * Time: 4:04 PM
 */

namespace Ana\Generator\Generators;

use Faker\Factory;


class Faker extends Factory
{
    private function getFaker()
    {
        return static::create();
    }
}