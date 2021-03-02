<?php

namespace Middleware;

use Sysgem\Session;

trait AuthCheck {
    public function checklogin(){
        if( Session::has('user_id') == false ){
            header('location: ' . $this->baseurl . '/admin/login');
        }
        return $this;
    }
}