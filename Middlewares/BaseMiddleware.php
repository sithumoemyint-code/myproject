<?php
namespace Middlewares;

use Sysgem\Session;

class BaseMiddleware {
    
    public function __construct($class = NULL, $function = NULL){
        if($class != NULL && $function != NULL) {
            return $class->$function();
        }
    }
}