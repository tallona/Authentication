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

function template_sync_ldap() {
	global $context, $settings, $options, $txt, $scripturl, $db_type, $modSettings;

	// If sync has finished tell the user.
	if (!empty($context['ldap_sync_finished']))
		echo '
			<div class="sync_finished">
				', $txt['ldap_sync_done'], '
			</div>';

	echo '
	<div id="manage_maintenance">
		<div class="cat_bar">
			<h3 class="catbg">', $txt['ldap_sync_title'], '</h3>
		</div>
		<div class="windowbg">
			<div class="content">';

		// No sysnc running?
		if (!$context['running'])
		{
			echo '
				<form action="', $context['post_url'], ';', $context['session_var'], '=', $context['session_id'], '" method="post" accept-charset="', $context['character_set'], '">
					<p>', $txt['ldap_sync_info'], '</p>';
			
			// Is LDAP enabled?
			if (isset($modSettings['ldap_enabled']) && $modSettings['ldap_enabled'])
				echo '<input type="submit" value="', $txt['auth_run_now'], '" class="button_submit" />';

			echo '
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
				</form>';
		}
		else
			echo $context['body'];

		echo '
			</div>
		</div>
	</div>';
}

?>