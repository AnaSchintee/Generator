<?php
/**
 * Created by PhpStorm.
 * User: ana.schintee
 * Date: 8/10/2017
 * Time: 2:57 PM
 */

namespace Ana\Generator\Exception;

use Throwable;

    class InvalidParamException extends \Exception {

        public function __construct($message = "", $code = 0, Throwable $previous = null)
        {
            parent::__construct($message, $code, $previous);
        }

}