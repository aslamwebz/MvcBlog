<?php
/**
 * phpblog ForbiddenException.php.
 * Initial Version by: Em
 * Creation Date: 5/10/2021
 */


namespace app\core\exceptions;


class ForbiddenException extends \Exception {

    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}