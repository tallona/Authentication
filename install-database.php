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

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
	require_once(dirname(__FILE__) . '/SSI.php');
}

db_extend('packages');
$smcFunc['db_add_column'] (
	'{db_prefix}members',
	array(
		'name' => 'auth_type',
		'type' => 'tinyint',
		'default' => 0,
		'null' => false
	),
	array(),
	'ignore'
);

?>