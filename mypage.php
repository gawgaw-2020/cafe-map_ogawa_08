<?php
session_start();

define("title" ,"マイページ｜モニカツ-朝活情報-");
$pagerole = 'myapge';


if(!isset($_SESSION['login_user']['user_id']) || $_SESSION["chk_ssid"] !== session_id()){
  header('Location: /cafe-map_ogawa_08/login/index.php');
  exit;
} else {
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}

$user_id = $_SESSION['login_user']['user_id'];
$user_name = $_SESSION['login_user']['user_name'];
$user_memo = $_SESSION['login_user']['user_memo'];
$user_image_name = $_SESSION['login_user']['user_image_name'];

$user_image_name_old = $_SESSION['login_user']['user_image_name'];

try {

  require_once(dirname(__FILE__) . '/assets/functions/dbconnect.php');

  $counts = $dbh->prepare('SELECT COUNT(*) AS posted_books_cnt FROM books WHERE book_post_author = ?');
  $counts->execute(array($user_id));
  $cnt = $counts->fetch();
  $posted_books_cnt = $cnt['posted_books_cnt'];

  $sql = 'SELECT book_id, book_title, book_author, book_memo, book_published, book_image_name, book_post_author FROM books WHERE book_post_author = ? ORDER BY book_id DESC';
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
  $stmt->execute();

  
  $dbh = null;


} catch (PDOException $e) {
  echo 'DB接続エラー' . $e->getMessage();
  exit();
}






?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

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
  <section class="mypage">
    <div class="section-inner">
      <div class="mypage__profile">
        <form action="user_edit.php" method="post" enctype="multipart/form-data">
          <div class="profile-card">
          <?php if ($user_image_name === ''): ?>
            <div class="profile-card__image">
              <img src="https://oga-chan.jp/cafe-map_ogawa_08/assets/img/icon.png" alt="">
            </div>
          <?php else: ?>
            <div class="profile-card__image">
              <img src="/cafe-map_ogawa_08/assets/img/user_img/<?= $user_image_name ?>" alt="">
            </div>
          <?php endif; ?>
            <dl id="js_image_change" class="file-box">
              <dt class="file-box__title">プロフィール画像を変更</dt>
              <dd class="file-box__data"><input id="gazou" type="file" name="user_image_name" onchange="loadImage(this);"></dd>
              <?php if ($user_image_name === ''): ?>
                <dd><p id="preview" class="profile-card__image"><img id="js-preview-image" src="https://oga-chan.jp/cafe-map_ogawa_08/assets/img/icon.png" alt=""></p></dd>
              <?php else: ?>
                <dd><p id="preview" class="profile-card__image"><img id="js-preview-image" src="/cafe-map_ogawa_08/assets/img/user_img/<?= $user_image_name ?>" alt=""></p></dd>
              <?php endif; ?>
            </dl>
            <input id="js-user_name" name="user_name" class="profile-card__name" type="text" value="<?= $user_name; ?>" readonly>
            <div class="profile-card__memo">
              <textarea name="user_memo" id="js-user_memo" readonly><?= $user_memo ?></textarea>
            </div>
            <div class="profile-card__numbers">
              <div class="profile-numbers">
                <div class="profile-numbers__box">
                  <p class="profile-numbers__number"><?= $posted_books_cnt ?></p>
                  <p class="profile-numbers__title">投稿</p>
                </div>
                <div class="profile-numbers__box">
                  <p class="profile-numbers__number">72</p>
                  <p class="profile-numbers__title">フォロー</p>
                </div>
                <div class="profile-numbers__box">
                  <p class="profile-numbers__number">32</p>
                  <p class="profile-numbers__title">フォロワー</p>
                </div>
              </div>
            </div>
            <p id="js_profile_edit" class="profile-card__edit" >プロフィール編集</p>
            <input id="js_profile_edit_done" type="submit" class="profile-card__edit edit_done" value="プロフィールを編集する">
            <input type="hidden" name="user_image_name_old" value="<?= $user_image_name_old; ?>">
          </div>
        </form>
      </div>
      <div class="mypage__posts">
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
      </div>
    </div>
  </section>



</main>

<?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>
<script src="/cafe-map_ogawa_08/assets/js/image-preview.js"></script>

<script>
  $('#js_profile_edit_done').hide();
  $('#js_image_change').hide();

  $('#js_profile_edit').on('click', () => {
    $('#js_profile_edit').hide();
    $('#js_profile_edit_done').show();
    $('#js_image_change').show();

    $('#js-user_name').attr('readonly',false);
    $('#js-user_name').css('pointer-events','initial');
    $('#js-user_name').css('border','1px solid #999');

    $('#js-user_memo').attr('readonly',false);
    $('#js-user_memo').css('pointer-events','initial');
    $('#js-user_memo').css('border','1px solid #999');
  });
</script>

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