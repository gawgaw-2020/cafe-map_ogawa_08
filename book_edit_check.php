<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');


// ページ情報
$pagerole = 'addbook';
define("title" ,"おすすめ書籍編集 -確認画面-");

var_dump($_POST);


$book_id = $_POST['book_id'];
$book_name = $_POST['book_name'];
$book_author = $_POST['book_author'];
$book_memo = $_POST['book_memo'];
$book_published = $_POST['book_published'];

$book_image_name_old = $_POST['book_image_name_old'];

$selected_image_url = $_POST['selected_image_url'];

$img_url = array(
  $selected_image_url
);

var_dump($img_url);

$book_gazou = $_FILES['book_image_name'];

// エラーチェック

if ($book_name === '') {
  $error[] = '書籍名が入力されていません。';
}

$dis_gazou = '<img src="/cafe-map_ogawa_08/assets/img/book_img/'.$book_image_name_old.'">';
if ($book_gazou['size'] > 0) {
  move_uploaded_file($book_gazou['tmp_name'], './assets/img/book_img/' . $book_gazou['name']);
  $dis_gazou = '<img src="/cafe-map_ogawa_08/assets/img/book_img/'.$book_gazou['name'].'">';
} else {
  // URLからダウンロード & imgタグ作成
  if (!$img_url[0] === '') {
    foreach( $img_url as $value ) {
      
      //ファイル名をユニークにするために、ダウンロード時のタイムスタンプを付ける
      $filename = 'book-image'.date('Ymdhis').rand(101, 999).'.jpeg';
      sleep(1);
      
  
      //画像の取得と保存
      $data = file_get_contents($value);
      file_put_contents('./assets/img/book_img/'.$filename,$data);
      $dis_gazou = '<img src="/cafe-map_ogawa_08/assets/img/book_img/'.$filename.'">';
      $book_gazou['name'] = $filename;
    }
  }
}

?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
<section class="book-add-check">
    <div class="section-inner">
      <!-- 見出しここに入れる -->
      <?php
      // エラーに合致したら
      if($book_name === ''): ?>
        <?php for ($i = 0; $i < count($error); $i++): ?>
        <!-- ここにエラーを表示 -->
          <p class="input-error-message"><?= $error[$i]; ?></p>
        <?php endfor; ?>
        <form>
          <div class="#">
            <button class="btn btn--transparent btn--link_transparent" type="button" onclick="history.back()">戻る</button>
          </div>
        </form>
      <?php else: ?>
        <dl class="book-data-list">
          <dt class="book-data-list__title">書籍名</dt>
          <dd class="book-data-list__data"><?= h($book_name); ?></dd>
          <dt class="book-data-list__title">著者</dt>
          <dd class="book-data-list__data"><?= h($book_author); ?></dd>
          <dt class="book-data-list__title">一言コメント</dt>
          <dd class="book-data-list__data"><?= h($book_memo); ?></dd>
          <dt class="book-data-list__title">出版年月日</dt>
          <dd class="book-data-list__data"><?= h($book_published); ?></dd>
          <dt class="staff-data-list__title">書籍画像</dt>
          <dd class="staff-data-list__data disp-image max-w200"><?= $dis_gazou; ?></dd>
        </dl>
        <form method="post" action="book_edit_done.php">
          <div>
            <input type="hidden" name="book_id" value="<?= h($book_id) ?>">
            <input type="hidden" name="book_name" value="<?= h($book_name); ?>">
            <input type="hidden" name="book_author" value="<?= h($book_author); ?>">
            <input type="hidden" name="book_memo" value="<?= h($book_memo); ?>">
            <input type="hidden" name="book_published" value="<?= h($book_published); ?>">
            <input type="hidden" name="book_image_name_old" value="<?= h($book_image_name_old); ?>">
            <input type="hidden" name="book_image_name" value="<?= $book_gazou['name']; ?>">
            <div class="form-btns">
              <button class="btn btn--blue btn--link_blue" type="submit">おすすめ書籍を編集する</button>
              <button class="btn btn--transparent btn--link_transparent" type="button" onclick="history.back()">戻る</button>
            </div>
          </div>
        </form>
        <?php endif; ?>
    </div>
  </section>

</main>

<?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>

</body>
</html>