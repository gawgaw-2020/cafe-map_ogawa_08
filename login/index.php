<?php
session_start();

$pagerole = 'dispbook';
define("title" ,"ログイン");

$email = '';
if (isset($_COOKIE['user_email'])) {
  $email = $_COOKIE['user_email'];
}

$error['login'] = '';

if (!empty($_POST)) {

  if ($_POST['user_email'] !== '' && $_POST['user_password'] !== '') {
    require_once (dirname(__FILE__) . '/../assets/functions/dbconnect.php');

    $login = $dbh->prepare('SELECT * FROM users WHERE user_email=?');
    $login->execute(array(
      $_POST['user_email'],
    ));
    $user = $login->fetch();

    if(password_verify($_POST['user_password'], $user['user_password'])) {
      // セッションを再生成
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user;
      $_SESSION["chk_ssid"]  = session_id();

      if ($_POST['save'] === 'on') {
        setcookie("user_email", $_POST['user_email'], time() + 60*60*24*14, "/");
      }

      header('Location: /cafe-map_ogawa_08/index.php');
      exit();

    } else {
      $error['login'] = 'failed';
    }
  } else {
    $error['login'] = 'blank';
  }
}


?>
<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

<main class="main">
  <div class="section-container">
    <section class="login">
      <div class="section-inner">
        <h1 class="level1-heading">ログイン</h1>
        <p class="login__text">「モニカツ」ではおすすめの書籍と店舗の閲覧はログイン無しでもお楽しみいただけます。</p>
        <p class="login__text">朝活の投稿やお気に入り機能を楽しみたい場合は、こちらからログインしてください。</p>

        <?php if ($error['login'] === 'blank'): ?>
          <p class="error">メールドレスまたはパスワードを入力してください</p>
        <?php endif; ?>
        <?php if ($error['login'] === 'failed'): ?>
          <p class="error">メールドレスまたはパスワードを正しく入力してください</p>
        <?php endif; ?>

        <form class="login-form" method="post" action="">
  
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
            <input id="js-input-user_email" class="input-box__input" type="email" name="user_email" value="<?= $email ?>" autofocus >
          </div>
          
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード</label>
            <input class="field js-password input-box__input" id="js-input-user_password" type="password" name="user_password" value="" placeholder="パスワードを入力" autocomplete="off" required="required">
            <div class="btn">
              <input class="btn-input js-password-toggle" id="eye" type="checkbox">
              <label class="btn-label js-password-label" for="eye"><i class="far fa-eye"></i></label>
            </div>
          </div>
          
          <div class="input-box">
            <label for="js-input-save"><input id="js-input-save" type="checkbox" name="save" value="on"><span class="label_inner">入力内容を保存する</sapn></label>
          </div>

          <div class="submit">
            <input class="btn btn--large btn--blue btn--link_blue" type="submit" value="ログイン">
          </div>
        </form>
        <p class="login__text text-c">はじめてご利用される方は<a href="/cafe-map_ogawa_08/regist/index.php" style="color:blue;">こちら</a></p>
        <p class="login__text text-c">パスワードをお忘れの方は<a href="#" style="color:blue;">こちら</a></p>
      </div>
    </section>
  </div>
</main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
<script>
  const passwordToggle = document.querySelector('.js-password-toggle');
  passwordToggle.addEventListener('change', function () {
    const password = document.querySelector('.js-password'),
          passwordLabel = document.querySelector('.js-password-label');
    if (password.type === 'password') {
      password.type = 'text';
      passwordLabel.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
      password.type = 'password';
      passwordLabel.innerHTML = '<i class="fas fa-eye"></i>';
    }
    password.focus();
  });
</script> 

</body>
</html>