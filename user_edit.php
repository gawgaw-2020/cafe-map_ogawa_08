<?php
session_start();

if(!isset($_SESSION['login_user']['user_id']) || $_SESSION["chk_ssid"] !== session_id()){
  header('Location: /cafe-map_ogawa_08/login/index.php');
  exit;
} else {
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}

require_once(dirname(__FILE__) . '/assets/functions/common.php');

$user_id = $_SESSION['login_user']['user_id'];
$user_name = $_POST['user_name'];
$user_memo = $_POST['user_memo'];
$user_image_name_old = $_POST['user_image_name_old'];

$user_gazou = $_FILES['user_image_name'];
if ($user_gazou['size'] > 0) {
  $random_str = random($length = 8);
  move_uploaded_file($user_gazou['tmp_name'], './assets/img/user_img/' . $random_str . $user_gazou['name']);
  $user_image_name = $random_str . $user_gazou['name'];
} else {
  $user_image_name = $user_image_name_old;
}


try {

  require_once(dirname(__FILE__) . '/assets/functions/dbconnect.php');


  $stmt = $dbh->prepare("UPDATE users SET user_name = :a1, user_memo = :a2, user_image_name = :a3 WHERE user_id = :a4");
  $stmt->bindValue(':a1', $user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a2', $user_memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a3', $user_image_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a4', $user_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  
  $dbh = null;

  if ($user_image_name_old !== $user_image_name) {
    if ($user_image_name_old !== '') {
      unlink (dirname(__FILE__) . '/assets/img/user_img/'.$user_image_name_old);
    }
  }


  $_SESSION['login_user']['user_name'] = $user_name;
  $_SESSION['login_user']['user_memo'] = $user_memo;
  $_SESSION['login_user']['user_image_name'] = $user_image_name;


  header('Location: /cafe-map_ogawa_08/mypage.php');
  exit();

} catch(PDOException $e) {
  print 'データベースの接続に失敗しました。';
  exit();
}



?>