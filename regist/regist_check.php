<?php

require_once (dirname(__FILE__) . '/../assets/functions/common.php');

// ページ情報
$pagerole = 'regist';
define("title", "ユーザー登録確認画面");

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_password02 = $_POST['user_password02'];

// エラーチェック

$error = [];
// 未入力チェック
if ($user_name === '') {
  $error[] = 'ユーザー名が入力されていません。';
}
if ($user_email === '') {
  $error[] = 'メールアドレスが入力されていません。';
}
if ($user_password === '' || $user_password02 === '') {
  $error[] = 'パスワードが入力されていません。';
}

// ユーザーネームの文字数チェック

// メールの正規表現チェック
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
  $error[] = 'メールアドレスは正しい形式で入力してください';
}

// パスワード文字数・一致チェック
if (strlen($user_password) < 4) {
  $error[] = 'パスワードは4文字以上で入力してください。';
}
if (!preg_match("/\A[a-z\d]{4,100}+\z/i", $user_password)) {
  $error[] = 'パスワードは半角英数字4文字以上で入力してください';
}
if ($user_password !== $user_password02) {
  $error[] = '確認用パスワードと異なっています';
}


// アカウントの重複をチェック
if (empty($error)) {
  require_once (dirname(__FILE__) . '/../assets/functions/dbconnect.php');
  $member = $dbh->prepare('SELECT COUNT(*) as cnt FROM users WHERE user_email=?');
  $member->execute(array($user_email));
  $record = $member->fetch();
  if ($record['cnt'] > 0) {
    $error[] = 'こちらのメールアドレスは既に登録されています。';
  }
}


?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_header.php'); ?>


<main class="main">
  <div class="section-container">
    <section class="regist-check">
      <h1 class="level1-heading">入力内容確認</h1>
      <div class="registration-steps">
        <div class="registration-steps_step">
          <div class="num">1</div>
          <div class="text">ユーザー情報入力</div>
        </div>
        <div class="registration-steps_line"></div>
        <div class="registration-steps_step -active">
          <div class="num">2</div>
          <div class="text">ユーザー情報確認</div>
        </div>
        <div class="registration-steps_line"></div>
        <div class="registration-steps_step">
          <div class="num">3</div>
          <div class="text">ユーザー登録完了</div>
        </div>
      </div>
      <?php
      // エラーに合致したら
      if($error): ?>
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
          <dt class="book-data-list__title">ユーザー名</dt>
          <dd class="book-data-list__data"><?= h($user_name); ?></dd>
          <dt class="book-data-list__title">メールアドレス</dt>
          <dd class="book-data-list__data"><?= h($user_email); ?></dd>
          <dt class="book-data-list__title">パスワード</dt>
          <dd class="book-data-list__data">**************</dd>
        </dl>
        <form method="post" action="regist_done.php">
          <div>
            <input type="hidden" name="user_name" value="<?= h($user_name); ?>">
            <input type="hidden" name="user_email" value="<?= h($user_email); ?>">
            <input type="hidden" name="user_password" value="<?= h($user_password); ?>">
            <div class="form-btns">
              <button class="btn btn--blue btn--link_blue" type="submit">ユーザー登録をする</button>
              <button class="btn btn--transparent btn--link_transparent" type="button" onclick="history.back()">戻る</button>
            </div>
          </div>
        </form>
        <?php endif; ?>
      </section>
  </div>
</main>

<?php include(dirname(__FILE__) . '/../assets/_inc/_footer.php'); ?>
<script>
  $(".label_inner").click(function(){
    if ( $('#js-input-kiyaku').is(':checked') ){ 
        // ボタンを有効化
        $('#submit-btn').prop('disabled', true);
    } else { 
        // ボタンを無効化
        $('#submit-btn').prop('disabled', false); 
    }  
  });
</script>

</body>

</html>