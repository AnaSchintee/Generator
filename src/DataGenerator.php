<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/16/2017
 * Time: 3:22 PM
 */

namespace Ana\Generator;


class DataGenerator
{

    /** @var  FakeDataInterface */
    private $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;

    }

    public function getFunction($value) {
        $matches = [];
        preg_match_all("/\{\{\s*(.*?)\s*\}\}/", $value, $matches);

        return $matches[1];
    }

    public function getFunctionName($value): array {
        $matches = [];
        preg_match_all("/\d+\.\d+|\w+/", $value, $matches);

        return $matches;

    }

    public function generateValue($pattern)
    {
        $functions = $this->getFunction($pattern);

        if(is_array($functions) and !$functions == null) {

            foreach ($functions as $function) {
                $functionValues = $this->getFunctionName($function);

                switch ($functionValues[0][0]) {

                    case "integer":
                        $result = $this->faker->generateInteger($functionValues[0][1],$functionValues[0][2]);
                        break;

                    case "string":
                        $result = $this->faker->generateString($functionValues[0][1],$functionValues[0][2]);
                        break;

                    case "float":
                        $result = $this->faker->generateFloat($functionValues[0][1],$functionValues[0][2]);
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

                $pattern = preg_replace("/\{\{\s*(.*?)\s*\}\}/", $result, $pattern, count($functionValues[0][0]));
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