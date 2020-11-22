<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');

// ページ情報
$page = 'addbook';
define("title" ,"おすすめ書籍登録 -完了画面-");


$book_name = $_POST['book_name'];
$book_author = $_POST['book_author'];
$book_memo = $_POST['book_memo'];
$book_published = $_POST['book_published'];
$gazou_name = $_POST['gazou_name'];

// var_dump($_POST);

try {

  require_once (dirname(__FILE__) . '/assets/functions/dbconnect.php');


  $stmt = $dbh->prepare("INSERT INTO books ( book_title, book_author, book_memo, book_published, book_image_name, book_post_author, book_date, book_modified ) VALUES( :a1, :a2, :a3, :a4, :a5, :a6, sysdate(), sysdate() )");
  $stmt->bindValue(':a1', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a2', $book_author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a3', $book_memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a4', $book_published, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a5', $gazou_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a6', 1, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  
  $dbh = null;

  header('Location: /cafe-map_ogawa_08/book_disp.php');
  exit();

} catch(PDOException $e) {
  print 'データベースの接続に失敗しました。';
  exit();
}



?>