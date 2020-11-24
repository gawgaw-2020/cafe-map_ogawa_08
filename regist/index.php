<?php

$pagerole = 'regist';
define("title", "ユーザー登録");

?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_header.php'); ?>

<main class="main">
  <div class="section-container">
    <section class="regist">
      <div class="section-inner">
        <h1 class="level1-heading">朝活ユーザー登録</h1>
        <div class="registration-steps">
          <div class="registration-steps_step -active">
            <div class="num">1</div>
            <div class="text">ユーザー情報入力</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">2</div>
            <div class="text">ユーザー情報確認</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">3</div>
            <div class="text">ユーザー登録完了</div>
          </div>
        </div>
        <p class="regist__text">以下の内容を全てご記入いただき、確認画面へお進みください。</p>
        <form class="regist-form" method="post" action="/cafe-map_ogawa_08/regist/regist_check.php">
  
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_name">ユーザーネーム</label>
            <input id="js-input-user_name" class="input-box__input" type="text" name="user_name" autofocus>
          </div>
  
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
            <input id="js-input-user_email" class="input-box__input" type="email" name="user_email">
          </div>
  
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード（半角英数字4文字以上）</label>
            <input id="js-input-user_password" class="input-box__input" type="password" name="user_password">
          </div>
  
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password02">パスワード（確認）</label>
            <input id="js-input-user_password02" class="input-box__input" type="password" name="user_password02">
          </div>
  
          <div class="input-box">
            <label for="js-input-kiyaku"><input id="js-input-kiyaku" type="checkbox" name="" id=""><span class="label_inner">利用規約に同意する</sapn></label>
          </div>
  
          <div class="submit">
            <input id="submit-btn" class="btn btn--large btn--blue btn--link_blue" type="submit" value="確認画面へ" disabled>
          </div>
        </form>
      </div>
    </section>
  </div>
</main>

<?php include(dirname(__FILE__) . '/../assets/_inc/_footer.php'); ?>
<script>
  $(document).ready(function(){
    $('input:checkbox').prop('checked', false);
  }); 
  
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