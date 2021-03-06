<?php

/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/21/2017
 * Time: 12:34 PM
 */
namespace tests;

use Ana\Generator\DataGenerator;
use Ana\Generator\FakerDataGenerator;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $fakerMock;

    /** @var  DataGenerator */
    private $generator;

    public function setUp()
    {
        $this->fakerMock = $this->createMock(FakerDataGenerator::class);

        $this->generator = new DataGenerator(
            $this->fakerMock);
    }

    public function testGenerateValueForInteger()
    {
        $this->fakerMock->method('generateInteger')
                        ->willReturn(5);

        $this->assertEquals(5, $this->generator->generateValue('{{integer()}}'));
        $this->assertEquals("+-1 5 1245", $this->generator->generateValue('+-1 {{integer()}} 1245'));
    }

    public function testGenerateValueForFloat()
    {
        $this->fakerMock->method('generateFloat')
            ->willReturn(5.5);

        $this->assertEquals(5.5, $this->generator->generateValue('{{float()}}'));
        $this->assertEquals("+-1 5.5 1245", $this->generator->generateValue('+-1 {{float()}} 1245'));
    }

    public function testGenerateValueForString()
    {
        $this->fakerMock->method('generateString')
            ->willReturn("Ana Banana");

        $this->assertEquals("Ana Banana", $this->generator->generateValue('{{string(<length>)}}'));
        $this->assertEquals("+-1 Ana Banana 1245", $this->generator->generateValue('+-1 {{string(<length>)}} 1245'));
    }

    public function testGenerateValueForFirstName()
    {
        $this->fakerMock->method('generateFirstName')
            ->willReturn("Ana");

        $this->assertEquals("Ana", $this->generator->generateValue('{{firstname()}}'));
        $this->assertEquals("+-1 Ana 1245", $this->generator->generateValue('+-1 {{firstname()}} 1245'));
    }

 function testGenerateValueForLastName()
    {
        $this->fakerMock->method('generateLastName')
            ->willReturn("Banana");

        $this->assertEquals("Banana", $this->generator->generateValue('{{lastname()}}'));
        $this->assertEquals("+-1 Banana 1245", $this->generator->generateValue('+-1 {{lastname()}} 1245'));
    }

    public function testGenerateValueForUserName()
    {
        $this->fakerMock->method('generateUserName')
            ->willReturn("john.snow");

        $this->assertEquals("john.snow", $this->generator->generateValue('{{username()}}'));
        $this->assertEquals("+-1 john.snow 1245", $this->generator->generateValue('+-1 {{username()}} 1245'));
    }

    public function testGenerateValueForBoolean()
    {
        $this->fakerMock->method('generateBoolean')
            ->willReturn(true);

        $this->assertEquals(true, $this->generator->generateValue('{{boolean()}}'));
        $this->assertEquals("+-1 1 1245", $this->generator->generateValue('+-1 {{boolean()}} 1245'));
    }

    public function testGenerateValueForEmail()
    {
        $this->fakerMock->method('generateEmail')
            ->willReturn("john.snow@yahoo.com");

        $this->assertEquals("john.snow@yahoo.com", $this->generator->generateValue('{{email()}}'));
        $this->assertEquals("+-1 john.snow@yahoo.com 1245", $this->generator->generateValue('+-1 {{email()}} 1245'));
    }

    public function testGenerateValueForAddress()
    {
        $this->fakerMock->method('generateAddress')
            ->willReturn("Disneyland");

        $this->assertEquals("Disneyland", $this->generator->generateValue('{{address()}}'));
        $this->assertEquals("+-1 Disneyland 1245", $this->generator->generateValue('+-1 {{address()}} 1245'));
    }

    public function testGenerateValueForError()
    {
        $this->fakerMock->method('generateInteger')
            ->willReturn("Error");

        $this->assertEquals("Error", $this->generator->generateValue('{{integer24()}}'));
        $this->assertEquals("+-1 Error 1245", $this->generator->generateValue('+-1 {{integer24()}} 1245'));
    }

}
