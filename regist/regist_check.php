<?php

$pagerole = 'dispbook';
define("title", "ユーザー登録");

?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_header.php'); ?>

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
    <section class="regist-check">
      <h1 class="level1-heading">朝活ユーザー登録</h1>
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
    }  });
</script>
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