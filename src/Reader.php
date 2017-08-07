<?php

/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/24/2017
 * Time: 3:05 PM
 */

namespace Ana\Generator;

class Reader
{
    /** @var  FakeDataInterface */
    private $faker;

    /** @var array  */
    public $json = [];


    public function __construct($faker, $content = '')
    {
        $this->faker = $faker;
        $this->json = $content;
    }

    public function iterate()
    {
        $arr = [];
        foreach ($this->json as $key => $value) {
            $arr[$key] = $this->generateValue($value);
        }
        echo json_encode($arr);
    }

    public function generateValue($pattern)
    {
        $matches = [];
        preg_match_all("/\{\{\s*(.*?)\s*\}\}/", $pattern, $matches);

        $functions = $matches[1];

        if(is_array($functions) and !$functions == null) {

            foreach ($functions as $function) {
                $matches = [];
                preg_match_all("/\d+\.\d+|\w+/", $function, $matches);

                switch ($matches[0][0]) {

                    case "integer":
                        $result = $this->faker->generateInteger($matches[0][1],$matches[0][2]);
                        break;

                    case "string":
                        $result = $this->faker->generateString($matches[0][1],$matches[0][2]);
                        break;

                    case "float":
                        $result = $this->faker->generateFloat($matches[0][1],$matches[0][2]);
                        break;

                    case "firstname":
                        $result = $this->faker->generateFirstName();
                        break;

                    case "lastname":
                        $result = $this->faker->generateLastName();
                        break;

                    case "boolean":
                        $result = $this->faker->generateBoolean();
                        break;

                    case "username":
                        $result = $this->faker->generateUserName();
                        break;

                    case "email":
                        $result = $this->faker->generateEmail();
                        break;

                    case "address":
                        $result = $this->faker->generateAddress();
                        break;

                    default:
                        $result = "Error";
                }

                $pattern = preg_replace("/\{\{\s*(.*?)\s*\}\}/", $result, $pattern, count($matches[0][0]));
            }
        }
        if($pattern != strval($result))
        {
            return $pattern;
        } else
        {
            return $result;
        }
    }
}
