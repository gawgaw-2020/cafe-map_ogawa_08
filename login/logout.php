<?php
	session_start();
  $_SESSION = array();

	if(ini_get("session.use_cookies")){
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000, '/',
			$params["path"], $params["domain"], $params["secure"], $params["httponly"]
		);
	}

  session_destroy();
  
	setcookie('user_email', '', time()-420000, '/');
	
  header('location: /cafe-map_ogawa_08/');
  exit();

?>