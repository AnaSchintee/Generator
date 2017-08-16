<?php

/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 7/24/2017
 * Time: 3:05 PM
 */

namespace Ana\Generator;

class Reader
{
    public $file;
    public $fileContent = null;

    public function __construct($file) {
        $this->file = $file;
        $this->validateFile();
        $this->populateFileContent();
    }

    public function validateFile() {
        if($this->file == null){
            throw new InvalidParamException('No parameter introduced');
        }

        if(!file_exists($this->file) && !filter_var($this->file, FILTER_VALIDATE_URL)) {
            throw new FileNotExistsException('The file could not be found');
        }
    }

    public function getFile() {
        return $this->file;
    }

    public function getContent() {
        $this->populateFileContent();
        return  $this->fileContent;
    }

    public function decodeFile() {
        $data = json_decode($this->getContent());
       if($data == null) {
           throw new InvalidJsonException('The format of the file is wrong');
       }
       return  json_decode($this->getContent(), true);
    }

    private function populateFileContent(): void {
        if ($this->fileContent == null) {
            $this->fileContent = file_get_contents($this->getFile());
        }
    }

}