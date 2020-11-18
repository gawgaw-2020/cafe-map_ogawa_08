<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');

$page = 'addcafe';
define("title" ,"朝カフェ登録画面");

?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main style="margin-top: 100px;">
  <form action="cafe_add_check.php" method="post">
    <div class="input-box">
      <label class="input-box__label" for="js-input--text">店名<span class="required">※必須</span></label>
      <input id="js-input--text" class="input-box__input" type="text" name="store_name" autocomplete="off">
    </div>
    <div class="input-box">
      <label class="input-box__label" for="js-input--text">最寄駅<span class="required">※必須</span></label>
      <input id="js-input--text" class="input-box__input" type="text" name="station" autocomplete="off">
    </div>
    <div class="input-box">
      <label class="input-box__label" for="js-input--text">開店時間<span class="required">※必須</span></label>
      <input id="js-input--text" class="input-box__input" type="text" name="open_time" autocomplete="off">
    </div>
    <div class="input-box">
      <label class="input-box__label" for="js-input--text">一言コメント<span class="required">※必須</span></label>
      <input id="js-input--text" class="input-box__input" type="text" name="store_memo" autocomplete="off">
    </div>
    <div class="input-box">
      <label class="input-box__label" for="js-input--text">住所</label>
      <input id="js-input--text" class="input-box__input" type="text" name="store_address" autocomplete="off">
    </div>
    <div class="radio-box">
      <p class="radio-box__label">Wi-Fi</p>
      <div class="radio-box__item">
        <input class="radio-box__radio" type="radio" id="wifi1" name="wifi" value="有り">
        <label for="wifi1">有り</label>
      </div>
      <div class="radio-box__item">
        <input class="radio-box__radio" type="radio" id="wifi2" name="wifi" value="無し">
        <label for="wifi2">無し</label>
      </div>
      <div class="radio-box__item">
        <input class="radio-box__radio" type="radio" id="wifi0" name="wifi" value="不明" checked>
        <label for="wifi0">不明</label>
      </div>
    </div>
    <div class="radio-box">
      <p class="radio-box__label">コンセント情報</p>
      <div class="radio-box__item">
        <input class="radio-box__radio" type="radio" id="power_source1" name="power_source" value="有り">
        <label for="power_source1">有り</label>
      </div>
      <div class="radio-box__item">
        <input class="radio-box__radio" type="radio" id="power_source0" name="power_source" value="無し">
        <label for="power_source0">無し</label>
      </div>
      <div class="radio-box__item">
        <input class="radio-box__radio" type="radio" id="power_source3" name="power_source" value="不明" checked>
        <label for="power_source3">不明</label>
      </div>
    </div>
    <div class="textarea-box">
      <label class="textarea-box__label" for="js-textarea">メニュー</label>
      <textarea name="menu" id="js-textarea" class="textarea-box__textarea" cols="30" rows="5"></textarea>
    </div>
    <div class="input-box">
      <label  class="input-box__label" for="js-input--password">編集・削除用パスワード<span class="required">※必須</span></label>
      <input id="js-input--password" class="input-box__input" type="password" name="pass">
    </div>
    <div class="form-btns">
      <button class="btn btn--blue btn--link_blue" type="submit">入力内容を確認する</button>
      <a href="/cafe-map_ogawa_08/" class="btn btn--transparent btn--link_transparent" type="submit">戻る</a>
    </div>
  </form>
</main>