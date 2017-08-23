<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/16/2017
 * Time: 3:22 PM
 */

namespace Ana\Generator;

use Ana\Generator\Exception;

class DataGenerator
{

    /** @var  \Faker\Generator */
    protected $faker;

    public function __construct($fakerGenerator)
    {
        $this->faker = $fakerGenerator;
    }

    public function getFunction($value) {
        $matches = [];
        preg_match_all("/\{\{\s*(.*?)\s*\}\}/", $value, $matches);

        return $matches[1];
    }

    public function getTemplate($value)
    {
        $matches = [];
        preg_match_all("/\d+\.\d+|\w+/", $value, $matches);

        return new TemplateMethod($matches[0]);
    }


    public function generateValue($pattern)
    {
        $functions = $this->getFunction($pattern);

        if(is_array($functions) and !$functions == null) {
            foreach ($functions as $function) {
                $template = $this->getTemplate($function);
                $strategy = $this->getStrategy($template->getMethod());
                $result = $strategy->getResult($template->getParams());

                $pattern = preg_replace("/\{\{\s*(.*?)\s*\}\}/", $result, $pattern, count($strategy));
            }
        }

        if($pattern != strval($result))
        {
            return $pattern;
        } else
        {
            return $result;
        }
    }

    private function getStrategy($method)
    {
        $className = 'Ana\\Generator\\Strategy\\'.ucfirst($method).'Strategy';

        if(!class_exists($className)) {
            throw new StrategyNotExistsException("The strategy doesn't exist!");
        }

        return new $className($this->faker);
    }

}
