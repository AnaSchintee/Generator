<?php

require_once "vendor/autoload.php";

use Ana\Generator\Reader;
use Ana\Generator\Parser;

$reader = new Reader("D:\work\Generator\input\Initial.json");
$parser = new Parser(new \Ana\Generator\FakerDataGenerator(\Faker\Factory::create()), $reader);
$value = $parser->iterate();
$parser->generateJSON($value);

