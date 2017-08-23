<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/21/2017
 * Time: 5:32 PM
 */

namespace Ana\Generator\Strategy;

use Ana\Generator\DataGeneratorInterface;

class BooleanStrategy implements DataGeneratorInterface
{
    /** @var  \Faker\Generator */
    protected $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;

    }

    public function getResult($array)
    {
        return $this->faker->boolean($chanceOfGettingTrue = 50);
    }

}