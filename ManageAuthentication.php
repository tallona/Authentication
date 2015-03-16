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

if (!defined('SMF')) {
	die('Hacking attempt...');
}

function ManageAuthentication()
{	
	global $context, $txt, $scripturl, $modSettings, $sourcedir;
	
	// This is just to keep the ldap settings more secure.
	isAllowedTo('admin_forum');
	
	$subActions = array(
		'sync_ldap' => 'SyncLDAP',
		'settings_ldap' => 'SettingsLDAP',
	);
	
	checkSession('request');

	loadTemplate('ManageAuthentication');
	loadLanguage('ManageAuthentication');

	// We'll need the utility functions from here.
	require_once($sourcedir . '/ManageServer.php');

	$context['page_title'] = $txt['auth_title'];
	$context['sub_template'] = 'show_settings';

	// By default we're viewing LDAP settings
	$_REQUEST['sa'] = isset($_REQUEST['sa']) && isset($subActions[$_REQUEST['sa']]) ? $_REQUEST['sa'] : 'sync_ldap';
	$context['sub_action'] = $_REQUEST['sa'];

	// Load up all the tabs...
	$context[$context['admin_menu_name']]['tab_data'] = array(
		'title' => $txt['auth_title'],
		'description' => $txt['auth_description'],
	);

	// Call the right function for this sub-action.
	$subActions[$_REQUEST['sa']]();
}

/**
 * Syncing SMF members table with active directory
 */
function SyncLDAP()
{
	global $context, $scripturl, $modSettings, $sourcedir;

	$context['body'] = null;
	$context['running'] = false;

	require_once($sourcedir . '/Errors.php');
	
	$context['post_url'] = $scripturl . '?action=admin;area=auth;sa=sync_ldap;run';
	if (isset($_REQUEST['run'])) {
		$context['running'] = true;
	}
	
	if ($context['running']) {
		require_once($sourcedir . '/Subs-Authentication.php');
		contactLDAPServer('sync');
	}

	$context['sub_template'] = 'sync_ldap';
}

/**
 * Set LDAP settings
 */
function SettingsLDAP($return_config = false)
{
	global $context, $txt, $scripturl, $smcFunc;
	
	// Get membergroups
	$vRequest = $smcFunc['db_query'] ('', '
		SELECT id_group, group_name
		FROM {db_prefix}membergroups
		WHERE min_posts = {int:min_posts}
		ORDER BY group_name ASC',
		array(
			'min_posts' => -1
		)
	);
	
	$vMembergroups[0] = $txt['ldap_membergroup_default'];
	
	while ($vRow = $smcFunc['db_fetch_assoc']($vRequest)) {
		$vMembergroups[$vRow['id_group']] = $vRow['group_name'];
	}
	
	$smcFunc['db_free_result']($vRequest);

	$config_vars = array(
		array('check', 'ldap_enabled'),
		'',
		array('text', 'ldap_host'),
		array('text', 'ldap_port'),
		array('text', 'ldap_dn'),
		array('text', 'ldap_user'),
		array('password', 'ldap_password'),
		'',
		array('select', 'ldap_protocol_version', array(2 => '2', 3 => '3')),
		array('check', 'ldap_referrals'),
		'',
		array('text', 'ldap_username_extension'),
		array('text', 'ldap_search_filter'),
		array('text', 'ldap_default_group'),
		'',
		array('text', 'ldap_attrib_user_login'),
		array('text', 'ldap_attrib_email'),
		'',
		array('select', 'ldap_primary_membergroup', $vMembergroups),
	);

	if ($return_config) {
		return $config_vars;
	}
		
	// Setup the template stuff.
	$context['post_url'] = $scripturl . '?action=admin;area=auth;sa=settings_ldap;save';
	$context['settings_title'] = $txt['ldap_settings_title'];

	// Saving settings?
	if (isset($_REQUEST['save'])) {
		saveDBSettings($config_vars);
		redirectexit('action=admin;area=auth;sa=settings_ldap;' . $context['session_var'] . '=' . $context['session_id'] . ';msg=' . (!empty($context['settings_message']) ? $context['settings_message'] : 'core_settings_saved'));
	}

	prepareDBSettingContext($config_vars);
}

?>