<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');

$pagerole = 'addbook';
define("title" ,"おすすめ書籍登録画面");

?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<!--DEMO01-->
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div class="close-animatedModal"> 
        <p><i class="fas fa-times"></i></p>
    </div>
        
    <div class="modal-content">
        <!--Your modal content goes here-->
        <div id="interactive" class="viewport"></div>
    </div>
</div>

<main>
  <section class="cafe-add">
    <div class="section-inner">
      <h1 class="level1-heading">おすすめ書籍登録</h1>

      <div class="search">
        <div class="book-search">
          <div class="google-books_search">
            <p>フリーワードで検索</p>
            <input type="text" id='search_word' placeholder="タイトル・著者名など">
            <button type='search' id='search'>検索</button>
          </div>
          <a id="js-bar-code_search-start" href="#animatedModal" class="bar-code_search">
            <p><i class="fas fa-barcode"></i></p>
            <p>バーコード検索を<br>はじめる</p>
          </a>
        </div>
      </div>

      <div class="search-result">
        <ul id="content1" class="result-list"></ul>
      </div>
      <form action="book_add_check.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_name">書籍名<span class="required">※必須</span></label>
          <input id="js-input-book_name" class="input-box__input" type="text" name="book_name"  autofocus >
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_author">著者</label>
          <input id="js-input-book_author" class="input-box__input" type="text" name="book_author">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_memo">一言コメント</label>
          <input id="js-input-book_memo" class="input-box__input" type="text" name="book_memo">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-book_published">出版年月日</label>
          <input id="js-input-book_published" class="input-box__input" type="text" name="book_published">
        </div>
        <dl class="file-box">
          <dt class="file-box__title">書籍画像</dt>
          <dd class="file-box__data"><input id="gazou" type="file" name="gazou" onchange="loadImage(this);"></dd>
          <dd class="max-w200"><p id="preview"><img id="js-preview-image" src="" alt="書籍画像のプレビュー表示"></p></dd>
        </dl>
        <div class="form-btns">
          <input id="js-hidden-image" type="hidden" name="selected_image_url" value="">
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
<script src="/cafe-map_ogawa_08/assets/js/animatedModal.min.js"></script>
<script type="text/javascript" src="https://serratus.github.io/quaggaJS/examples/js/quagga.min.js"></script>
<script src="/cafe-map_ogawa_08/assets/js/quagga.js"></script>
<script>
  $('#js-preview-image').hide();
  $("#js-bar-code_search-start").animatedModal({
    color: '#78B2D1'
  });
</script>
</body>
</html>