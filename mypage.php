<?php
session_start();

if(isset($_SESSION['login_user']['user_id'])){
  echo "ようこそ、".$_SESSION['login_user']['user_name']."さん！";
}else{
  header('Location: /cafe-map_ogawa_08/login/index.php');
  exit;
}

?>