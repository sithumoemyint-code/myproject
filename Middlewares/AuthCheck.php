<?php
namespace Middlewares;

use Sysgem\Session;

class AuthCheck {
    
    public function __construct($class, $function){
        if( Session::has('login_user') == false ){
            header('location: '.URL_ROOT.'admin/adminRegisterLogin/login');
            exit();
        }
        return $class->$function();
    }
}