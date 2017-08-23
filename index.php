<?php

require_once "vendor/autoload.php";

use Ana\Generator\Reader;
use Ana\Generator\Parser;
use Ana\Generator\DataGenerator;

$reader = new Reader("D:\work\Generator\input\Initial.json");
$generator = new DataGenerator(Faker\Factory::create());
$parser = new Parser($reader, $generator);
$parser->generateJSON($parser->iterate());


