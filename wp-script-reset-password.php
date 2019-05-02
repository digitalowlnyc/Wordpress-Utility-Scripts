<?php

require './wp-blog-header.php';

function reset_p() {
	global $wpdb;

		$user_login = "admin";
		$user_pass  = "";

		if(empty($user_pass)) {
			die("Please check script: " . "-1000");
		}

		$user_login_for_id_one = $wpdb->get_var( "SELECT user_login FROM $wpdb->users WHERE ID = '1' LIMIT 1" );
		if($user_login !== $user_login_for_id_one) {
			die("This is not the admin user, admin =" . $user_login_for_id_one);
		}
		
		$res = $wpdb->query( "UPDATE $wpdb->users SET user_pass = MD5('$user_pass'), user_activation_key = '' WHERE user_login = '$user_login'");

		print_r($res);
		
		echo "DONE UPDATING!";
}

reset_p();