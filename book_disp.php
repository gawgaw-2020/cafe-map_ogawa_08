<?php
session_start();

$pagerole = 'dispbook';
define("title", "おすすめ書籍一覧画面");

try {

  require_once(dirname(__FILE__) . '/assets/functions/dbconnect.php');

  if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
  } else {
    $page = 1;
  }

  $page = max($page, 1);

  $counts = $dbh->query('SELECT COUNT(*) AS cnt FROM books');
  $cnt = $counts->fetch();
  $maxpage = ceil($cnt['cnt'] / 9);
  $page = min($page, $maxpage);

  $start = ($page - 1) * 9;

  $sql = 'SELECT book_id, book_title, book_author, book_memo, book_published, book_image_name, book_post_author FROM books WHERE 1 ORDER BY book_id DESC LIMIT ?,9';
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(1, $start, PDO::PARAM_INT);
  $stmt->execute();

  $dbh = null;
} catch (PDOException $e) {
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}


?>
<?php include(dirname(__FILE__) . '/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__) . '/assets/_inc/_header.php'); ?>

<!-- 削除確認モーダル -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <p>投稿を削除しますか？</p>
    <a class="btn btn--transparent btn--link_transparent btn--small js-modal-close" href="">キャンセル</a>
    <button id="book_delete_btn" class="btn btn--red btn--link_red btn--small" >削除</button>
    <p>この操作は取り消せません。あなたのプロフィール、タイムライン、ユーザーのお気に入りから投稿が削除されます。</p>
    <a class="js-modal-close" href=""><i class="fas fa-times"></i>閉じる</a>
  </div>
</div>


<main>
  <section class="book-disp">
    <div class="section-inner">
      <h1 class="level1-heading">おすすめ書籍一覧</h1>
      <ul class="book-list">
        <?php
        while (true) :
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($rec === false) {
            break;
          }
        ?>
          <li class="book-card">
            <?php
            if ($_SESSION['login_user']['user_id'] === $rec['book_post_author']) {
              echo '<div id="'. $rec['book_id'] .'" class="book-card__edit" onclick="display(this);"><i class="fas fa-ellipsis-h"></i></div>';
            }
            ?>
            <div class="book-card__branch">
              <ul class="branch-list">
                <li class="delete js-modal-open"><i class="far fa-trash-alt"></i>削除</li>
                <li class="edit"><a href="/cafe-map_ogawa_08/book_edit.php?book_id=<?= $rec['book_id']; ?>"><i class="far fa-edit"></i>編集</a></li>
              </ul>
            </div>

            <div class="book-card__header">
              <h3 class="book-card__title"><?php echo mb_strimwidth($rec['book_title'], 0, 40, '…', 'UTF-8') ?></h3>
              <p class="book-card__text"><span class="mr24">著者：<?php echo mb_strimwidth($rec['book_author'], 0, 25, '…', 'UTF-8') ?></span> 出版年月日：<?php echo $rec['book_published'] ?></p>
            </div>
            <div class="book-card__body">
              <p class="book-card__thumbnail">
                <img src="/cafe-map_ogawa_08/assets/img/book_img/<?php echo $rec['book_image_name'] ?>" alt="" class="book-card__image">
              </p>
              <p class="book-card__memo"><?php echo mb_strimwidth($rec['book_memo'], 0, 300, '…', 'UTF-8') ?></p>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
      <div class="pagenation">
        <?php if ($page > 1) : ?>
          <a href="book_disp.php?page=<?= $page - 1; ?>" class="pagenation__left"><i class="fas fa-angle-double-left"></i></a>
        <?php else : ?>
          <a href="book_disp.php?page=<?= $page - 1; ?>" class="pagenation__left--disable"></a>
        <?php endif; ?>

        <?php if ($page < $maxpage) : ?>
          <a href="book_disp.php?page=<?= $page + 1; ?>" class="pagenation__right"><i class="fas fa-angle-double-right"></i></a>
        <?php else : ?>
          <a href="book_disp.php?page=<?= $page - 1; ?>" class="pagenation__right--disable"></a>
        <?php endif; ?>

      </div>
    </div>
  </section>
</main>
<?PHP


?>

<?php include(dirname(__FILE__) . '/assets/_inc/_footer.php'); ?>

<script>

function display(self){
  let selectedTargetID = self.getAttribute('id');
  localStorage.setItem('selectedTargetID', selectedTargetID);

  const ele = $(`#${selectedTargetID}`).next();
  ele.toggle('fast');
}

// 削除ボタン押した処理
document.getElementById('book_delete_btn').addEventListener('click', () => {
  const selectedTargetID = localStorage.getItem('selectedTargetID');
  window.location.href = '/cafe-map_ogawa_08/book_delete.php?book_id='+ selectedTargetID;
});


$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});
</script>
<script>
  var $grid = $('.book-list'),   
    emptyCells = [],
    i;

    // アイテム (li.item) の数だけ空のアイテム (li.cell.is-empty) を生成
    for (i = 0; i < $grid.find('.book-card').length; i++) {
        emptyCells.push($('<li>', { class: 'book-card is-empty' }));
    }

    $grid.append(emptyCells);
</script>

</body>

</html>