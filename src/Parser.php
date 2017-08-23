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
            $arr[$key] = $this->generator->generateValue($value);
        }

        return $arr;
    }

    public function generateJSON($array) {
        echo json_encode($array);
    }

}