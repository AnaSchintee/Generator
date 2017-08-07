<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/28/2017
 * Time: 5:57 PM
 */

namespace Ana\Generator;


class FakerDataGenerator implements FakeDataInterface
{
    /** @var  \Faker\Generator */
    protected $faker;

    public function __construct($fakerGenerator)
    {
        $this->faker = $fakerGenerator;
    }

    public function getFaker()
    {
        return $this->faker;
    }

    public function generateInteger($min = 0, $max = Null)
    {
        return $this->getFaker()->numberBetween($min, $max);
    }

    public function generateString($indicator,$value)
    {

        if ($indicator === "length" ) {
            $word = ' ';
            while (strlen($word) < intval($value + 1)) {
                $word = $this->getFaker()->word;
            }
        }
        return $word;
    }

    public function generateFloat( $min = 0, $max = NULL)
    {
        return $this->getFaker()->randomFloat($nb = NULL, $min, $max);
    }

    public function generateFirstName()
    {
        return $this->getFaker()->firstName($gender = 'male'|'female');
    }

    public function generateLastName()
    {
        return $this->getFaker()->lastName;
    }

    public function generateUserName()
    {
        return $this->getFaker()->userName;
    }

    public function generateEmail()
    {
        return $this->getFaker()->email;
    }

    public function generateBoolean()
    {
        return $this->getFaker()->boolean($chanceOfGettingTrue = 50);
    }

    public function generateAddress()
    {
        return $this->getFaker()->streetAddress;
    }
}