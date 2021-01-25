<?php
namespace Middlewares;

use Sysgem\Session;

trait AuthCheck {
    
    public function check(){
        if( Session::has('login_user') == false ){
            header('location: '.$this->baseurl.'/admin/adminRegisterLogin/login');
        }
    }
}