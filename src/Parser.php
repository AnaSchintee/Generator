<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/7/2017
 * Time: 1:43 PM
 */

namespace Ana\Generator;



class Parser
{
    /** @var  DataGenerator */
    private $generator;

    /** @var  Reader*/
    private $reader;

    public function __construct($reader, $generator)
    {
        $this->reader = $reader;
        $this->generator = $generator;
    }


    public function iterate()
    {
        $arr = [];
        foreach ($this->reader->decodeFile() as $key => $value) {
            if (is_string($value)) {
                $arr[$key] = $this->generator->generateValue($value);
            } else {
                $arr[$key] =  $this->iterateJson($value);
                }
        }
        return $arr;
    }


    public function iterateJson($value)
    {
        $newArr = [];
        foreach ($value as $newKey => $newValue) {
            if (is_string($newValue)) {
                $newArr[$newKey] = $this->generator->generateValue($newValue);
            } else
                $newArr[$newKey] = $this->iterateJson($newValue);
        }
        return $newArr;
    }

    public function generateJSON($array) {
        return $array;
    }
}