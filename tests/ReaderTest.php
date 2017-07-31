<?php

/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/21/2017
 * Time: 12:34 PM
 */

use Faker\Factory;

class ReaderTest extends \PHPUnit\Framework\TestCase
{
    /** @var PHPUnit_Framework_MockObject_MockObject */
    private $fakerMock;
    private $reader;

    public function setUp()
    {
//        $this->fakerMock = $this->getMockBuilder('Faker\Generator')
//            ->disableOriginalConstructor()
//            ->setMethods(['format', '__call'])
//            ->getMock();
        $readerMock = new Reader(
            new \Ana\Generator\Generators\Generator(\Faker\Factory::create()),
            json_decode(file_get_contents("D:\work\Generator\input\Initial.json"), true)
        );

    }
        public function testGenerateValueForInteger()
        {
//        $this->fakerMock->method('numberBetween')->willReturn(4);
            $this->fakerMock->method('__call')->with('numberBetween')->willReturn(4);
            /** @var \Ana\Generator\Reader $reader */
            $readerMock = $this->getMockBuilder('Reader',['getInteger']);
            $readerMock->method('getInteger')
                        ->willReturn(5);
            $this->assertEquals(5, $reader->generateValue('{{integer()}}'));
        }
}
