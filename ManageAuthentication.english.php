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

// Admin Menu Labels
$txt['admin_auth_title'] = 'Authentication';
$txt['admin_auth_ldap_settings'] = 'LDAP Settings';
$txt['admin_auth_ldap_sync'] = 'Sync LDAP';

// Section & Sub-section labels
$txt['auth_title'] = 'Authentication';
$txt['auth_description'] = 'Manage and setup different authentication methods for your forum.';
$txt['ldap_sync_title'] = 'Run LDAP Sync';
$txt['ldap_settings_title'] = 'LDAP Settings';

// Connection Error
$txt['ldap_disabled'] = 'LDAP disabled, a user tried to login with: ';

// Sync Labels
$txt['ldap_conn_not_set'] = 'Some credentials missing, unable to proceed.';
$txt['ldap_conn_failed'] = 'Failed to connect to LDAP server.';
$txt['ldap_bind_failed'] = 'Failed to bind LDAP details.';
$txt['ldap_search_error'] = 'Error searching for user on authentication server.';
$txt['ldap_sync_completed'] = 'The sync completed successfully. %s members have been added or updated.<br/><br/>A - Added<br/>U - Updated<br/><br/>%s';
$txt['ldap_no_results_error'] = 'Error, no results found.';
$txt['ldap_login_failed'] = 'Failed to login onto LDAP server.';
$txt['ldap_unable_to_add_member'] = 'Unable to add new member: ';
$txt['ldap_unable_to_update_member'] = 'Unable to update member ID ';
$txt['ldap_sync_done'] = 'LDAP sync has completed.';
$txt['ldap_sync_info'] = 'This task will allow you to import users from an active directory via LDAP.';
$txt['auth_run_now'] = 'Run now';

// Setting Labels
$txt['ldap_enabled'] = 'Enable LDAP support';
$txt['ldap_host'] = 'Server';
$txt['ldap_port'] = 'Port';
$txt['ldap_user'] = 'Username';
$txt['ldap_password'] = 'Password';
$txt['ldap_protocol_version'] = 'Protocol Version';
$txt['ldap_referrals'] = 'Allow Referrals';
$txt['ldap_dn'] = 'Distinguished Name (DN)';
$txt['ldap_username_extension'] = 'Username Extension';
$txt['ldap_search_filter'] = 'Search Filter';
$txt['ldap_default_group'] = 'Default Group';
$txt['ldap_attrib_user_login'] = 'Default AD Username Field';
$txt['ldap_attrib_email'] = 'Default AD Email Field';
$txt['save_ldap_settings'] = 'Save';
$txt['ldap_primary_membergroup'] = 'Target Membergroup';
$txt['ldap_membergroup_default'] = '(no primary membergroup)';

//Errors in configuration
$txt['ldap_config_disabled'] = 'LDAP support is disabled, check configurations';
$txt['ldap_php_disabled'] = 'LDAP functions in PHP are not enabled! This MOD can\'t work without those';
?>