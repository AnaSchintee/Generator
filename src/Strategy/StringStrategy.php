<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/21/2017
 * Time: 5:18 PM
 */

namespace Ana\Generator\Strategy;

use Ana\Generator\DataGeneratorInterface;

class StringStrategy implements DataGeneratorInterface
{
    /** @var  \Faker\Generator */
    protected $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;

    }

    public function getResult($array)
    {
        if ($array[0] === "length" ) {
            $word = ' ';
            while (strlen($word) < intval($array[1] + 1)) {
                $word = $this->faker->word;
            }
        }
        return $word;
    }

}