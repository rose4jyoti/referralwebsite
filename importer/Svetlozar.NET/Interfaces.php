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

interface IObjectState
{
	/**
	 * Return a string that can be later used to restore state
	 * @return string
	 */
	public function GetState();


	/**
	 * Handle state restoring
	 * @param $state_str
	 */
	public function RestoreState($state_str);
}

interface IAuthState extends IObjectState
{

	/**
	 * Do not 100% rely on the response of this function, make a web request to a protected resource and only when successful consider authenticated to be true
	 * @return bool true if initialized parameters indicate authorization has been given
	 */
	public function Authenticated();


	/**
	 * Accept number of (login) parameters and attempt authentication
	 * @return bool true if authentication has succeeded
	 */
	public function Authenticate();
}
?>