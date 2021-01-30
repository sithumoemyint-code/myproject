<?php

namespace Sysgem;
use Models\MemberModel;

$memberModel = new MemberModel();

class Auth
{
	public static function check()
	{
		return Session::has('user_id');
	}
}