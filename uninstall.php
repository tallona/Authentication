<?php
/**
* Authentication
*
* @package Authentication
* @author Adam Tallon
* @copyright 2013 Adam Tallon
* @license See license.txt file
*
* @version 0.3
*/

// If SSI.php is in the same place as this file, and SMF isn't defined, this is being run standalone.
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
	require_once(dirname(__FILE__) . '/SSI.php');
} elseif (!defined('SMF')) {
	die('<b>Error:</b> Cannot uninstall - please verify you put this in the same place as SMF\'s index.php.');
}

remove_integration_function('integrate_admin_include', '$sourcedir/Subs-Authentication.php');
remove_integration_function('integrate_admin_areas', 'authenticationAdminMenuHook');
remove_integration_function('integrate_pre_include', '$sourcedir/Subs-Authentication.php');
remove_integration_function('integrate_validate_login', 'authenticationLoginHook');
remove_integration_function('integrate_other_passwords', 'authenticationOtherPasswordHook');

?>