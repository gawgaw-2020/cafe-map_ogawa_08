<?php
session_start();

if(!isset($_SESSION['login_user']['user_id']) || $_SESSION["chk_ssid"] !== session_id()){
  header('Location: /cafe-map_ogawa_08/login/index.php');
  exit;
} else {
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}

echo "ようこそ、".$_SESSION['login_user']['user_name']."さん！";

?>