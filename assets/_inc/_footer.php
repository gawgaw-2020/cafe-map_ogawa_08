<footer class="footer">
  <nav class="global-nav">
    <ul class="nav-list">
      <li class="nav-item">
        <a href="/cafe-map_ogawa_08/book_disp.php">
          <i class="fas fa-book-open"></i>
          <span>おすすめ書籍</span>
        </a>
      </li>
      <?php
        if(isset($_SESSION['login_user']['user_id'])){
          echo '<li class="nav-item">
                  <a href="/cafe-map_ogawa_08/book_add.php">
                    <i class="fas fa-book-medical"></i>
                    <span>書籍の投稿</span>
                  </a>
                </li>';
        }
      ?>
      <li class="nav-item">
        <a href="/cafe-map_ogawa_08/cafe_disp.php">
          <i class="fas fa-coffee"></i>
          <span>朝カフェ</span>
        </a>
      </li>
      <?php
        if(isset($_SESSION['login_user']['user_id'])){
          echo '<li class="nav-item">
                  <a href="/cafe-map_ogawa_08/cafe_add.php">
                    <i class="fas fa-plus-square"></i>
                    <span>朝カフェ登録</span>
                  </a>
                </li>';
        }
      ?>
    </ul>
  </nav>
</footer>
