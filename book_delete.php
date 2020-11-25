<?php
session_start();

require_once(dirname(__FILE__) . '/assets/functions/common.php');

$book_id = $_GET['book_id'];

require_once(dirname(__FILE__) . '/assets/functions/dbconnect.php');


$books = $dbh->prepare('SELECT book_image_name FROM books WHERE book_id = ?');
$books->execute(array($book_id));
$book = $books->fetch();

$book_image_name = $book['book_image_name'];

$sql = 'DELETE FROM books WHERE book_id = ?';
$stmt = $dbh->prepare($sql);
$data[] = $book_id;
$stmt->execute($data);

$dbh = null;

// 画像の削除
if ($book_image_name !== '') {
  unlink (dirname(__FILE__) . '/assets/img/book_img/'.$book_image_name);
}

header('Location: /cafe-map_ogawa_08/book_disp.php');
exit();



?>