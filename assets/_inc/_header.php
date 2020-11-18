
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
          <li class="gnavi__item"><a class="gnavi__link" href="/cafe-map_ogawa_08/"><span>朝活イベントをさがす</span></a></li>
          <li class="gnavi__item"><a class="gnavi__link" href="/cafe-map_ogawa_08/"><span>朝活イベントをつくる</span></a></li>
          <li class="gnavi__item <?php if ($page === 'dispcafe') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/cafe_disp.php"><span>朝カフェをさがす</span></a></li>
          <li class="gnavi__item <?php if ($page === 'addcafe') { echo 'gnavi__item--active';} ?>"><a class="gnavi__link" href="/cafe-map_ogawa_08/cafe_add.php"><span>朝カフェを登録する</span></a></li>
        </ul>
      </div>
      <div class="header__right">
        <p class="btn btn--blue btn--link_blue login"><a href="/cafe-map_ogawa_08/">ログイン</a></p>
        <p class="btn btn--blue btn--link_blue tutorial"><a href="/cafe-map_ogawa_08/">はじめての方</a></p>
      </div>
    </div>
  </header>