<?php

/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/21/2017
 * Time: 12:34 PM
 */
namespace tests;

use Ana\Generator\Generators\Generator;
use Ana\Generator\Reader;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $fakerMock;

    /** @var  Reader */
    private $reader;

    public function setUp()
    {
        $this->fakerMock = $this->createMock(Generator::class);

        $this->reader = new Reader(
            $this->fakerMock,
            json_decode(file_get_contents("D:\work\Generator\input\Initial.json"), true)
        );
    }

    public function testGenerateValueForInteger()
    {
        $this->fakerMock->method('generateInteger')
                        ->willReturn(5);

        $this->assertEquals(5, $this->reader->generateValue('{{integer()}}'));
        $this->assertEquals("+-1 5 1245", $this->reader->generateValue('+-1 {{integer()}} 1245'));
    }

    public function testGenerateValueForFloat()
    {
        $this->fakerMock->method('generateFloat')
            ->willReturn(5.5);

        $this->assertEquals(5.5, $this->reader->generateValue('{{float()}}'));
        $this->assertEquals("+-1 5.5 1245", $this->reader->generateValue('+-1 {{float()}} 1245'));
    }

    public function testGenerateValueForString()
    {
        $this->fakerMock->method('generateString')
            ->willReturn("Ana Banana");

        $this->assertEquals("Ana Banana", $this->reader->generateValue('{{string(<length>)}}'));
        $this->assertEquals("+-1 Ana Banana 1245", $this->reader->generateValue('+-1 {{string(<length>)}} 1245'));
    }

    public function testGenerateValueForFirstName()
    {
        $this->fakerMock->method('generateFirstName')
            ->willReturn("Ana");

        $this->assertEquals("Ana", $this->reader->generateValue('{{firstname()}}'));
        $this->assertEquals("+-1 Ana 1245", $this->reader->generateValue('+-1 {{firstname()}} 1245'));
    }

    public function testGenerateValueForLastName()
    {
        $this->fakerMock->method('generateLastName')
            ->willReturn("Banana");

        $this->assertEquals("Banana", $this->reader->generateValue('{{lastname()}}'));
        $this->assertEquals("+-1 Banana 1245", $this->reader->generateValue('+-1 {{lastname()}} 1245'));
    }

    public function testGenerateValueForUserName()
    {
        $this->fakerMock->method('generateUserName')
            ->willReturn("john.snow");

        $this->assertEquals("john.snow", $this->reader->generateValue('{{username()}}'));
        $this->assertEquals("+-1 john.snow 1245", $this->reader->generateValue('+-1 {{username()}} 1245'));
    }

    public function testGenerateValueForBoolean()
    {
        $this->fakerMock->method('generateBoolean')
            ->willReturn(true);

        $this->assertEquals(true, $this->reader->generateValue('{{boolean()}}'));
        $this->assertEquals("+-1 1 1245", $this->reader->generateValue('+-1 {{boolean()}} 1245'));
    }

    public function testGenerateValueForEmail()
    {
        $this->fakerMock->method('generateEmail')
            ->willReturn("john.snow@yahoo.com");

        $this->assertEquals("john.snow@yahoo.com", $this->reader->generateValue('{{email()}}'));
        $this->assertEquals("+-1 john.snow@yahoo.com 1245", $this->reader->generateValue('+-1 {{email()}} 1245'));
    }

    public function testGenerateValueForAdress()
    {
        $this->fakerMock->method('generateAdress')
            ->willReturn("Disneyland");

        $this->assertEquals("Disneyland", $this->reader->generateValue('{{adress()}}'));
        $this->assertEquals("+-1 Disneyland 1245", $this->reader->generateValue('+-1 {{adress()}} 1245'));
    }
}
