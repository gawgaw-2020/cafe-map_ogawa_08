<?php

$pagerole = 'dispbook';
define("title" ,"ログイン");

?>
<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

<!-- 工事中モーダル -->
<div class="popup" id="js-popup">
  <div class="popup-inner">
    <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
    <a href="#"><img src="/cafe-map_ogawa_08/assets/img/unfinished.png" alt="ポップアップ画像"></a>
  </div>
  <div class="black-background" id="js-black-bg"></div>
</div>


<main class="main">
  <div class="section-container">
    <section class="login">
      <div class="section-inner">
        <h1 class="level1-heading">ログイン</h1>
        <p class="login__text">「モニカツ」ではおすすめの書籍と店舗の閲覧はログイン無しでもお楽しみいただけます。</p>
        <p class="login__text">朝活の投稿やお気に入り機能を楽しみたい場合は、こちらからログインしてください。</p>
        <form class="login-form" method="post" action="/cafe-map_ogawa_08/login/login_check.php">
  
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
            <input id="js-input-user_email" class="input-box__input" type="email" name="user_email"  autofocus >
          </div>
    
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード</label>
            <input id="js-input-user_password" class="input-box__input" type="password" name="user_password">
          </div>
  
          <div class="input-box">
            <label for="js-input-save"><input id="js-input-save" type="checkbox" name="" id=""><span class="label_inner">入力内容を保存する</sapn></label>
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

<!-- 工事中モーダル -->
<script>
window.onload = function() {
  var popup = document.getElementById('js-popup');
  if(!popup) return;
  popup.classList.add('is-show');

  var blackBg = document.getElementById('js-black-bg');
  var closeBtn = document.getElementById('js-close-btn');

  closePopUp(blackBg);
  closePopUp(closeBtn);

  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.remove('is-show');
    })
  }
}
</script>

</body>
</html>