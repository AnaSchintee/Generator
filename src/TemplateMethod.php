<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/21/2017
 * Time: 2:56 PM
 */

namespace Ana\Generator;


class TemplateMethod
{
    /** @var string $method */
    private $method;

    /** @var array<string> $params */
    private $params;

    public function __construct($options)
    {
        if ($this->isValidTemplate($options)) {
            $this->method = array_shift($options);
            $this->params = $options;
        }
    }

    public function isValidTemplate($options)
    {
        return !empty($options[0]);
    }

    /**
     * @return int
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}