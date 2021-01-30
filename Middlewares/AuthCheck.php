<?php

namespace Middleware;

use Sysgem\Session;

class AuthCheck {
    
    public static function check(){
        if( Session::has('user_id') == false ){
            header('location: admin/login');
        }
    }

    public static function checkCat(){
        if( Session::has('user_id') == false ){
            header('location: login');
        }
    }
}