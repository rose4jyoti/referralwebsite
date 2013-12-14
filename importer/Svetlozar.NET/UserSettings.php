<?php
/// -----------------------------------------------------------------------------
/// Copyright 2006-2010, Svetlozar Petrov. All rights reserved.
/// http://svetlozar.net
///
/// Confidential and Proprietary, Not For Public Release.
///
/// No redistribution allowed without prior permission (see licence for details)
/// The above notice must remain unmodified in every source code file
/// -----------------------------------------------------------------------------

//! do not modify, change settings.php instead
class SPUserSettings
{
	protected static $settings;

	protected static function init()
	{
		$settings = array();
		require_once("settings.php");
		self::$settings = $settings;
	}

	public static function get_settings($key)
	{
		if (!self::$settings)
		{
			self::init();
		}

		return isset(self::$settings[$key]) ? self::$settings[$key] : null;
	}
}

?>