<?php

require_once(dirname(__FILE__) . '/assets/functions/common.php');

// ページ情報
$pagerole = 'addbook';
define("title" ,"おすすめ書籍編集 -完了画面-");


$book_id = $_POST['book_id'];
$book_name = $_POST['book_name'];
$book_author = $_POST['book_author'];
$book_memo = $_POST['book_memo'];
$book_published = $_POST['book_published'];
$book_image_name_old = $_POST['book_image_name_old'];
$book_image_name = $_POST['book_image_name'];

if ($book_image_name === '') {
  $book_image_name = $book_image_name_old;
}

try {

  require_once(dirname(__FILE__) . '/assets/functions/dbconnect.php');


  $sql = '';

  $stmt = $dbh->prepare("UPDATE books SET book_title = :a1, book_author = :a2, book_memo = :a3, book_published = :a4 ,book_image_name = :a5, book_modified = sysdate() WHERE book_id = :a6");
  $stmt->bindValue(':a1', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a2', $book_author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a3', $book_memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a4', $book_published, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a5', $book_image_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a6', $book_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  
  $dbh = null;

  // 画像の名前の比較...「違う＝上書き」
  // もともと空の場合もある

  if ($book_image_name_old !== $book_image_name) {
    if ($book_image_name_old !== '') {
      unlink (dirname(__FILE__) . '/assets/img/book_img/'.$book_image_name_old);
    }
  }


  header('Location: /cafe-map_ogawa_08/book_disp.php');
  exit();

} catch(PDOException $e) {
  print 'データベースの接続に失敗しました。';
  exit();
}



?>