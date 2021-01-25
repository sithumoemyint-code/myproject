<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\MemberModel;
use Sysgem\Session;
use Middlewares\AuthCheck;

class AdminHomeController extends BaseController
{
	use AuthCheck;
	
	private $memberModel;

	public function __construct()
	{
		$this->check();
		$this->memberModel = new MemberModel();
	}

	public function index()
	{
		$login_user = Session::get('login_user');
		$this->renderBlade('admin.index');
	}

}