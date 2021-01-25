<?php
namespace Middlewares;

use Sysgem\Session;

class AuthCheck {
    
    public static function check(){
        if( Session::has('login_user') == false ){
            header('location: admin/adminRegisterLogin/login');
        }
    }
}