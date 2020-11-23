<?php

$pagerole = 'dispbook';
define("title" ,"ログイン");

?>
<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

<main class="main">
  <div class="section-container">
    <section class="login">
      <h1 class="level1-heading">ログイン</h1>
      <p>「モニカツ」ではおすすめの書籍と店舗の閲覧はログイン無しでもお楽しみいただけます。</p>
      <p>朝活の投稿やお気に入り機能を楽しみたい場合は、こちらからログインしてください。</p>
      <form class="login-form" method="post" action="/cafe-map_ogawa_08/login/login_check.php">

      <div class="input-box">
        <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
        <input id="js-input-user_email" class="input-box__input" type="email" name="user_email"  autofocus >
      </div>

      <div class="input-box">
        <label class="input-box__label" for="js-input-user_password">パスワード</label>
        <input id="js-input-user_password" class="input-box__input" type="password" name="user_password">
      </div>

        <input type="checkbox" name="" id="">
        <p>入力内容を保存する</p>

        <div class="submit">
          <input class="btn btn--large btn--blue btn--link_blue" type="submit" value="ログイン">
        </div>
      </form>
      <p>はじめてご利用される方は<a href="#" style="color:blue;">こちら</a></p>
      <p>パスワードをお忘れの方は<a href="#" style="color:blue;">こちら</a></p>
    </section>
  </div>
</main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>

</body>
</html>