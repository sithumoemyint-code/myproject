<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\MemberModel;


class AdminHomeController extends BaseController
{
	private $memberModel;

	public function __construct()
	{
		$this->memberModel = new MemberModel();
	}

	public function index()
	{
		// $obj = $this->memberModel->getTable();
		// $member = json_decode(json_encode($obj));

		// setUserSession($member);
		$this->renderBlade('admin.index');
	}

}