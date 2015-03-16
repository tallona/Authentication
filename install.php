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
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif (!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

add_integration_function('integrate_admin_include', '$sourcedir/Subs-Authentication.php');
add_integration_function('integrate_admin_areas', 'authenticationAdminMenuHook');
add_integration_function('integrate_pre_include', '$sourcedir/Subs-Authentication.php');
add_integration_function('integrate_validate_login', 'authenticationLoginHook');
add_integration_function('integrate_other_passwords', 'authenticationOtherPasswordHook');

updateSettings(array(
	'ldap_protocol_version' => '3',
	'ldap_referrals' => '0',
	'ldap_search_filter' => '(cn=*)',
	'ldap_attrib_user_login' => 'samaccountname',
	'ldap_attrib_email' => 'mail',
	'ldap_primary_membergroup' => '0',
	),
false);
?>