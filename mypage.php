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


?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
  <section class="mypage">
    <div class="section-inner">
      <div class="mypage__profile">
        <div class="profile-card">
          <div class="profile-card__image">
            <img src="/cafe-map_ogawa_08/assets/img/user_img/icon.png" alt="">
          </div>
          <div class="profile-card__name">おがちゃん</div>
          <div class="profile-card__memo">
            <textarea name="" id="" readonly>プロフィールテキスト</textarea>
          </div>
          <div class="profile-card__numbers">
            <div class="profile-numbers">
              <div class="profile-numbers__box">
                <p class="profile-numbers__number">14</p>
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
          <div class="profile-card__edit">プロフィールを編集する</div>
        </div>
      </div>
      <div class="mypage__posts">
        投稿一覧
      </div>
    </div>
  </section>



</main>

<?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>


</body>
</html>