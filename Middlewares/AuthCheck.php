<?php

namespace Middlewares;

use Sysgem\Session;

trait AuthCheck {
    
    public function checkLogin(){
        if( Session::has('user_id') == false ){
            header('location: '.$this->baseurl.'/admin/login');
        }
        return $this;
    }

}