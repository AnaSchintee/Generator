<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/10/2017
 * Time: 3:11 PM
 */

namespace Ana\Generator;

use Throwable;

class InvalidJsonException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}