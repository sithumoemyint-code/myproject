<?php

namespace Sysgem;

class Session
{
	public static function add($key, $value)
	{
		if (!self::has($key)) {
			$_SESSION[$key] = $value;
		}else {
			echo 'Session with that '. $key . ' have alredy define ' ;
		}
	}

	public static function has($key)
	{
		return isset($_SESSION[$key]) ? true : false;
	}

	public static function getAndRemove($key)
	{
		if (self::has($key)) {
			$val = $_SESSION[$key];
			unset($_SESSION[$key]);
			return $val;
		}else {
			return null;
		}	
	}

	public static function remove($key)
	{
		if (self::has($key)) {
			unset($_SESSION[$key]);
		}
	}

	public static function get($key)
	{
		if (self::has($key)) {
			return $_SESSION[$key];
		}else {
			return null;
		}
	}

	public static function replace($key, $value)
	{
		if (self::has($key)) {
			self::remove($key);
		}
		self::add($key, $value);
	}

	public static function flash($key, $value = "")
	{
		if (!empty($value)) {
			self::replace($key, $value);
		}else {
			
			echo '<p class="text-center text-info english">' . self::get($key) . '</p>';
			self::remove($key);
		}
	}
}