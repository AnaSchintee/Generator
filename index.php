<?php

require_once "vendor/autoload.php";

use Ana\Generator\Reader;

$initJson = new Reader(new \Ana\Generator\FakerDataGenerator(\Faker\Factory::create()), json_decode(file_get_contents("D:\work\Generator\input\Initial.json"), true));
$initJson->iterate();