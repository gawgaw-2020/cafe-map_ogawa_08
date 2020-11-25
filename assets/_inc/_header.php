
<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__logo">
        <a href="/cafe-map_ogawa_08/">
          <h1 class="title">モニカツ</h1>
          <p class="header-logo"><img src="/cafe-map_ogawa_08/146_w_hoso.png" alt=""></p>
        </a>
      </div>
      <div class="gnavi">
        <ul class="gnavi__list">
          <li class="gnavi__item <?php if ($pagerole === 'feed') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/index.php"><span>ホーム</span></a></li>
          <li class="gnavi__item <?php if ($pagerole === 'dispbook') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/book_disp.php"><span>おすすめ書籍をさがす</span></a></li>
          <li class="gnavi__item <?php if ($pagerole === 'addbook') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/book_add.php"><span>本を登録する</span></a></li>
          <li class="gnavi__item <?php if ($pagerole === 'dispcafe') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/cafe_disp.php"><span>朝カフェをさがす</span></a></li>
          <li class="gnavi__item <?php if ($pagerole === 'addcafe') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/cafe_add.php"><span>朝カフェを登録する</span></a></li>
        </ul>
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