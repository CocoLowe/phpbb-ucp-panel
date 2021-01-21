<?php
/**
*
* @author Codemonkey hoha-admin@hohaguild.com
*
* @package HOHA-Applications
* @version $Id:$
* @copyright (c) Codemonkey 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

define('IN_PHPBB', true);
define('PHPBB_ROOT_PATH', 'C:/xampp/htdocs/forum/');
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);


// Start session management
$user->session_begin();
$auth->acl($user->data);
	
?>