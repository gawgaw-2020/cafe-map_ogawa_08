<?php
session_start();

if(!isset($_SESSION['login_user']['user_id']) || $_SESSION["chk_ssid"] !== session_id()){
  header('Location: /cafe-map_ogawa_08/login/index.php');
  exit;
} else {
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}

require_once (dirname(__FILE__) . '/assets/functions/common.php');


// ページ情報
$pagerole = 'addcafe';
define("title" ,"朝カフェ登録 -確認画面-");

$store_name = $_POST['store_name'];
$station = $_POST['station'];
$open_time = $_POST['open_time'];
$store_memo = $_POST['store_memo'];
$store_address = $_POST['store_address'];
$wifi = $_POST['wifi'];
$power_source = $_POST['power_source'];
$menu = $_POST['menu'];
$pass = $_POST['pass'];
$pro_gazou = $_FILES['gazou'];
// $pro_gazou{'name'}
// $pro_gazou['tmp_name']

// エラーチェック

if ($store_name === '') {
  $error[] = '店名が入力されていません。';
}
if ($station === '') {
  $error[] = '最寄駅が入力されていません。';
}
if ($open_time === '') {
  $error[] = '開店時間が入力されていません。';
}
if ($store_memo === '') {
  $error[] = '一言メモが入力されていません。';
}

if ($pro_gazou['size'] > 0) {
  move_uploaded_file($pro_gazou['tmp_name'], './assets/img/srore_img/' . $pro_gazou['name']);
  $dis_gazou = '<img src="/cafe-map_ogawa_08/assets/img/srore_img/'.$pro_gazou['name'].'">';
}





?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
<section class="cafe-add-check">
    <div class="section-inner">
      <!-- 見出しここに入れる -->
      <?php
      // エラーに合致したら
      if($store_name === '' || $station === '' || $open_time === '' || $store_memo === ''): ?>
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
        <dl class="cafe-data-list">
          <dt class="cafe-data-list__title">店名</dt>
          <dd class="cafe-data-list__data"><?= h($store_name); ?></dd>
          <dt class="cafe-data-list__title">最寄駅</dt>
          <dd class="cafe-data-list__data"><?= h($station); ?></dd>
          <dt class="cafe-data-list__title">開店時間</dt>
          <dd class="cafe-data-list__data"><?= h($open_time); ?></dd>
          <dt class="cafe-data-list__title">一言コメント</dt>
          <dd class="cafe-data-list__data"><?= h($store_memo); ?></dd>
          <dt class="cafe-data-list__title">住所</dt>
          <dd class="cafe-data-list__data"><?= h($store_address); ?></dd>
          <dt class="cafe-data-list__title">Wi-Fi</dt>
          <dd class="cafe-data-list__data"><?= h($wifi); ?></dd>
          <dt class="cafe-data-list__title">コンセント</dt>
          <dd class="cafe-data-list__data"><?= h($power_source); ?></dd>
          <dt class="cafe-data-list__title">メニュー</dt>
          <dd class="cafe-data-list__data"><?= h($menu); ?></dd>
          <dt class="cafe-data-list__title">編集用パスワード</dt>
          <dd class="cafe-data-list__data"><?= h($pass); ?></dd>
          <dt class="staff-data-list__title">店舗画像</dt>
          <dd class="staff-data-list__data disp-image"><?= $dis_gazou; ?></dd>
        </dl>
        <form method="post" action="cafe_add_done.php">
          <div class="#">
            <input type="hidden" name="store_name" value="<?= h($store_name); ?>">
            <input type="hidden" name="station" value="<?= h($station); ?>">
            <input type="hidden" name="open_time" value="<?= h($open_time); ?>">
            <input type="hidden" name="store_memo" value="<?= h($store_memo); ?>">
            <input type="hidden" name="store_address" value="<?= h($store_address); ?>">
            <input type="hidden" name="wifi" value="<?= h($wifi); ?>">
            <input type="hidden" name="power_source" value="<?= h($power_source); ?>">
            <input type="hidden" name="menu" value="<?= h($menu); ?>">
            <input type="hidden" name="pass" value="<?= h($pass); ?>">
            <input type="hidden" name="gazou_name" value="<?= $pro_gazou['name']; ?>">
            <div class="form-btns">
              <button class="btn btn--blue btn--link_blue" type="submit">朝カフェを新規登録する</button>
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