<?php

namespace Middlewares;

use Sysgem\Session;

trait AuthCheck {
    public function checklogin(){
        if( Session::has('user_id') == false ){
            header('location: ' . $this->baseurl . '/admin/login');
        }
        return $this;
    }

    public function out()
    {
    	if (Session::has('cart') == false) {
    		header('location: ' . $this->baseurl . '/index');
    	}
    	return $this;
    }
}