<?php
//print_r($_REQUEST);
//echo 'init.php='.$customerid;
?>



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

//! path definitions
define("SVETLOZARNET_DIR", dirname(__FILE__) . DIRECTORY_SEPARATOR);
define("SVETLOZARNET_CONTACTS", SVETLOZARNET_DIR . "Contacts" . DIRECTORY_SEPARATOR);
define("SVETLOZARNET_WEBCLIENTS", SVETLOZARNET_DIR . "WebClients" . DIRECTORY_SEPARATOR);

include_once SVETLOZARNET_DIR . 'ContactsHelper.php';
include_once SVETLOZARNET_DIR . 'SPCommon.php';
?>