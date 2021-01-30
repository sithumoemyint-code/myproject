<?php

namespace Middlewares;

use Sysgem\Session;

trait AdminAuthCheck {
    
    public function checkAdmin(){
        if( Session::get('user_id') != 4 ){
            header('location: '.$this->baseurl.'/admin');
            exit;
        }
        return $this;
    }

}