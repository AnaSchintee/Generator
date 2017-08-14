<?php

namespace tests;

use Ana\Generator\Reader;
use PHPUnit\Exception;
use PHPUnit\Framework\TestCase;

class NewReaderTest extends TestCase
{
    const INPUT_LOCATION = __DIR__."/../input/Unit";

    const FILES_TO_BE_CLEANED = [
        'volatile.json'
    ];

    public static function setUpBeforeClass()
    {
        foreach (self::FILES_TO_BE_CLEANED as $fileName) {
            $filePath = self::INPUT_LOCATION.'/'.$fileName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    /**
     * InvalidParamException
     * @expectedException \Exception
     */
    public function testEmpty()
    {
        $reader = new Reader(null);
    }

    /**
     * FileNotExistsException
     * @expectedException \Exception
     */
    public function testFileNotExists()
    {
        $reader = new Reader('blabla.txt');
    }

    /**
     * InvalidJsonException
     * @expectedException \Exception
     */
    public function testFileNotJson()
    {
        $reader = new Reader(self::INPUT_LOCATION.'/Invalid.json');
        $this->assertEquals('The format of the file is wrong', $reader->decodeFile());
    }


    public function testApiJson()
    {
        $path = 'https://jsonplaceholder.typicode.com/posts/1';
        $reader = new Reader($path);

        $this->assertEquals($path, $reader->getFile());

        $fileContents = file_get_contents($path);

        $this->assertJsonStringEqualsJsonString($fileContents, $reader->getContent());

        $this->assertArraySubset(['userId' => 1, 'id' => 1], $reader->decodeFile());
    }

    public function testReader()
    {
        $filePath = self::INPUT_LOCATION.'/Initial.json';
        $reader = new Reader($filePath);

        $this->assertEquals($filePath, $reader->getFile());

        $fileContents = file_get_contents($filePath);
        $this->assertJsonStringEqualsJsonString($fileContents, $reader->getContent());

        $this->assertArraySubset($reader->decodeFile(), ['id' => '{{ integer(1, 10) }}']);
    }

    public function testReaderWithFileModified()
    {
        $filePath = self::INPUT_LOCATION.'/volatile.json';
        file_put_contents($filePath, '{"id" : "{{ integer(1, 10) }}"}');

        $reader = new Reader($filePath);

        file_put_contents($filePath, '{"id2" : "{{ integer(1, 10) }}"}');

        $this->assertEquals($filePath, $reader->getFile());

        $this->assertJsonStringEqualsJsonString('{"id" : "{{ integer(1, 10) }}"}', $reader->getContent());

      $this->assertArraySubset($reader->decodeFile(), ['id' => '{{ integer(1, 10) }}']);
    }
}