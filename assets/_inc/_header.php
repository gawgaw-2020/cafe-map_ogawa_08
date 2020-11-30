
<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__logo">
        <a href="/cafe-map_ogawa_08/">
          <h1 class="title">アサドク</h1>
          <p class="header-logo"><img src="/cafe-map_ogawa_08/146_w_hoso.png" alt=""></p>
        </a>
      </div>
      <div class="gnavi">
      <?php
        if(!isset($_SESSION['login_user']['user_id'])){
          include('_logout-gnavi.php');
        } else {
          include('_login-gnavi.php');
        }
      ?>
      </div>
      <div class="header__right">
        <?php
          if(!isset($_SESSION['login_user']['user_id'])){
            echo '<p class="btn btn--blue btn--link_blue"><a class="btn-01" href="/cafe-map_ogawa_08/login/index.php">ログイン</a></p>';
          } else {
            echo '<p class="btn btn--blue btn--link_blue"><a class="btn-01" href="/cafe-map_ogawa_08/login/logout.php">ログアウト</a></p>';
          }
        ?>
        <?php
          if(!isset($_SESSION['login_user']['user_id'])){
            echo '<p class="btn btn--light-gray btn--link_light-gray"><a href="/cafe-map_ogawa_08/regist/index.php">はじめての方</a></p>';
          } else {
            echo '<p class="btn btn--light-gray btn--link_light-gray"><a href="/cafe-map_ogawa_08/mypage.php">マイページ</a></p>';
          }
        ?>
      </div>
    </div>
  </header>