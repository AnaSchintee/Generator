<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/21/2017
 * Time: 4:11 PM
 */

namespace Ana\Generator\Strategy;

use Ana\Generator\DataGeneratorInterface;

class IntegerStrategy implements DataGeneratorInterface
{

    /** @var  \Faker\Generator */
    protected $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;

    }

    public function getResult($array)
    {
        return $this->faker->numberBetween($array[0], $array[1]);
    }

}