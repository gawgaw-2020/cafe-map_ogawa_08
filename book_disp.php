<?php

$pagerole = 'dispbook';
define("title" ,"おすすめ書籍一覧画面");

try {

  require_once (dirname(__FILE__) . '/assets/functions/dbconnect.php');

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

  $sql = 'SELECT book_title, book_author, book_memo, book_published, book_image_name FROM books WHERE 1 ORDER BY book_id DESC LIMIT ?,9';
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(1, $start, PDO::PARAM_INT);
  $stmt->execute();

  $dbh = null;

} catch(PDOException $e) {
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}


?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
  <section class="book-disp">
    <div class="section-inner">
      <h1 class="level1-heading">おすすめ書籍一覧</h1>
      <ul class="book-list">
      <?php
          while (true):
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec === false) {
            break;
          }
          ?>
        <li class="book-card">
          <div class="book-card__header">
            <h3 class="book-card__title"><?php echo mb_strimwidth( $rec['book_title'], 0, 40, '…', 'UTF-8' ) ?></h3>
            <p class="book-card__text"><span class="mr24">著者：<?php echo mb_strimwidth( $rec['book_author'], 0, 25, '…', 'UTF-8' ) ?></span> 出版年月日：<?php echo $rec['book_published'] ?></p>
          </div>
          <div class="book-card__body">
            <p class="book-card__thumbnail">
              <img src="/cafe-map_ogawa_08/assets/img/book_img/<?php echo $rec['book_image_name'] ?>" alt="" class="book-card__image">
            </p>
            <p class="book-card__memo"><?php echo mb_strimwidth( $rec['book_memo'], 0, 300, '…', 'UTF-8' ) ?></p>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      <div class="pagenation">
        <?php if($page > 1): ?>
          <a href="book_disp.php?page=<?= $page-1; ?>" class="pagenation__left"><i class="fas fa-angle-double-left"></i></a>
        <?php else: ?>
          <a href="book_disp.php?page=<?= $page-1; ?>" class="pagenation__left--disable"></a>
        <?php endif; ?>

        <?php if($page < $maxpage): ?>
          <a href="book_disp.php?page=<?= $page+1; ?>" class="pagenation__right"><i class="fas fa-angle-double-right"></i></a>
        <?php else: ?>
          <a href="book_disp.php?page=<?= $page-1; ?>" class="pagenation__right--disable"></a>
        <?php endif; ?>

      </div>
    </div>
  </section>
</main>
<?PHP


?>

<?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>

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