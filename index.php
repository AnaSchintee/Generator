<?php

require_once "vendor/autoload.php";

use Ana\Generator\Reader;
use Ana\Generator\Parser;
use Ana\Generator\DataGenerator;

$reader = new Reader("D:\work\Generator\input\Initial.json");
$generator = new DataGenerator(new \Ana\Generator\FakerDataGenerator(\Faker\Factory::create()));
$parser = new Parser($reader, $generator);
$value = $parser->iterate();
$parser->generateJSON($value);


//$reader = new Reader("D:\work\Generator\input\Initial.json");
//$parser = new Parser(new \Ana\Generator\FakerDataGenerator(\Faker\Factory::create()), $reader);
//$value = $parser->iterate();
//$parser->generateJSON($value);

