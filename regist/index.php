<?php

$pagerole = 'dispbook';
define("title" ,"ログイン");

?>
<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

<main class="main">
  <div class="section-container">
    <section class="regist">
      <h1 class="level1-heading">朝活ユーザー登録</h1>
      <p>必須項目を全てご記入いただき、確認画面へお進みください。</p>
      <form class="regist-form" method="post" action="/cafe-map_ogawa_08/regist/regist_check.php">

        <div class="input-box">
          <label class="input-box__label" for="js-input-user_name">ユーザーネーム</label>
          <input id="js-input-user_name" class="input-box__input" type="text" name="user_name"  autofocus >
        </div>

        <div class="input-box">
          <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
          <input id="js-input-user_email" class="input-box__input" type="email" name="user_email">
        </div>

        <div class="input-box">
          <label class="input-box__label" for="js-input-user_password">パスワード</label>
          <input id="js-input-user_password" class="input-box__input" type="password" name="user_password">
        </div>

        <div class="input-box">
          <label class="input-box__label" for="js-input-user_password02">パスワード（確認）</label>
          <input id="js-input-user_password02" class="input-box__input" type="password" name="user_password02">
        </div>

        <input type="checkbox" name="" id="">
        <p>利用規約に同意する</p>

        <div class="submit">
          <input class="btn btn--large btn--blue btn--link_blue" type="submit" value="確認画面へ">
        </div>
      </form>
    </section>
  </div>
</main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>

</body>
</html>