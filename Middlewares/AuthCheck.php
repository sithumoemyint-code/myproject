<?php
namespace Middlewares;

use Sysgem\Session;

class AuthCheck extends BaseMiddleware{
    
    public function __construct($class = NULL, $function = NULL){
        if( Session::has('login_user') == false ){
            // echo '<h1>authcheck - caught</h1>'; exit;
            header('location: '.URL_ROOT.'admin/adminRegisterLogin/login');
            exit();
        }
        echo '<h1>authcheck - passed</h1>';
        parent::__construct($class, $function);
    }
}