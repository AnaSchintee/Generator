<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/28/2017
 * Time: 4:04 PM
 */

namespace Ana\Generator;


use phpDocumentor\Reflection\Types\Null_;

interface FakeDataInterface
{
    public function generateInteger($min = 0, $max = Null);
    public function generateString();
    public function generateFloat($min = 0, $max = Null);
    public function generateFirstName();
    public function generateLastName();
    public function generateUserName();
    public function generateEmail();
    public function generateBoolean();
    public function generateAdress();
}