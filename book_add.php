<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');

$page = 'addbook';
define("title" ,"おすすめ書籍登録画面");

?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
  <section class="cafe-add">
    <div class="section-inner">
      <h1 class="level1-heading">おすすめ書籍登録</h1>

      <div class="bar-code_search">

      </div>
      
      <div class="google-books_search">
        <input type="text" id='search_word' placeholder="けんさく">
        <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
        <button type='search' id='search'>検索</button>
      </div>
      <div class="search-result">
        <ul id="content1" class="result-list" style="display: flex;"></ul>
      </div>
      <form action="book_add_check.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_name">書籍名<span class="required">※必須</span></label>
          <input id="js-input-book_name" class="input-box__input" type="text" name="book_name" autocomplete="off" autofocus >
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_author">著者</label>
          <input id="js-input-book_author" class="input-box__input" type="text" name="book_author" autocomplete="off">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_memo">一言コメント</label>
          <input id="js-input-book_memo" class="input-box__input" type="text" name="book_memo" autocomplete="off">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_published">出版年月日</label>
          <input id="js-input-book_published" class="input-box__input" type="text" name="book_published" autocomplete="off">
        </div>
        <dl class="file-box">
          <dt class="file-box__title">書籍画像</dt>
          <dd class="file-box__data"><input id="gazou" type="file" name="gazou" onchange="loadImage(this);"></dd>
          <dd><p id="preview"><img id="js-preview-image" src="" alt="書籍画像のプレビュー表示"></p></dd>
        </dl>
        <div class="form-btns">
          <button class="btn btn--blue btn--link_blue" type="submit">入力内容を確認する</button>
          <a href="/cafe-map_ogawa_08/" class="btn btn--transparent btn--link_transparent" type="submit">戻る</a>
        </div>
      </form>
    </div>
  </section>
</main>

<?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>

<script src="/cafe-map_ogawa_08/assets/js/selectBook.js"></script>
<script src="/cafe-map_ogawa_08/assets/js/google-books.js"></script>
<script src="/cafe-map_ogawa_08/assets/js/image-preview.js"></script>
<script>
</script>
</body>
</html>