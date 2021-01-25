<?php

namespace Controllers;

use Jenssegers\Blade\Blade;

class BaseController
{
	protected $baseurl = '/MyProject5';

	public function renderBlade($blade_file, $data = [])
	{
		$blade = new Blade('Views', 'cache');
		echo $blade->render($blade_file, $data);
	}
}