<?php

define("title" ,"ホーム｜モニカツ-朝活情報-");
$pagerole = 'feed';


?>

<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
<p class="top-iamge"><img src="/cafe-map_ogawa_08/assets/img/unfinished.png" alt=""></p>
<div class="message">
  <h2>move mouse or tap.</h2>
</div>
<div class="sand"></div>
<div class="bb8">
  <div class="antennas">
    <div class="antenna short"></div>
    <div class="antenna long"></div>
  </div>
  <div class="head">
    <div class="stripe one"></div>
    <div class="stripe two"></div>
    <div class="eyes">
      <div class="eye one"></div>
      <div class="eye two"></div>
    </div>
    <div class="stripe three"></div>
  </div>
  <div class="ball">
    <div class="lines one"></div>
    <div class="lines two"></div>
    <div class="ring one"></div>
    <div class="ring two"></div>
    <div class="ring three"></div>
  </div>
  <div class="shadow"></div>
</div>
<div class="shameless">
  <a href="http://apexdesignstudios.com" target="_blank">apex design studio</a>
</div>

  <!-- <p>朝活したい人のためのアプリ</p>
  <p>朝カフェ登録は「朝活した投稿」に変更？</p>
  <p>朝カフェを探すは「みんなの朝活ログ」に変更？</p>
  <p>（連続何日とか「いいね」とか）</p> -->

  <!-- <div class="color-box color-01"></div>
  <div class="color-box color-02"></div>
  <div class="color-box color-03"></div>
  <div class="color-box color-04"></div>
  <div class="input-box">
    <label class="input-box__label" for="js-input--text">テキスト入力</label>
    <input id="js-input--text" class="input-box__input" type="text" name="#" autocomplete="off">
  </div>

  <div class="input-box">
    <label class="input-box__label" for="js-input--email">メールアドレス入力</label>
    <input id="js-input--email" class="input-box__input" type="email" name="email" autocomplete="off">
  </div>

  <div class="input-box">
    <label  class="input-box__label" for="js-input--password">パスワード入力</label>
    <input id="js-input--password" class="input-box__input" type="password" name="pass">
  </div>

  <div class="selectbox-box">
    <label class="selectbox-box__label" for="js-select">セレクトボックス</label>
    <select class="selectbox-box__select" name="#" id="js-select">
      <option value="未選択">選択してください</option>
      <option value="選択肢">選択肢</option>
      <option value="選択肢">選択肢</option>
      <option value="選択肢">選択肢</option>
      <option value="選択肢">選択肢</option>
    </select>
  </div>

  <div class="radio-box">
  <p class="radio-box__label">ラジオボタン</p>
    <div class="radio-box__item">
      <input class="radio-box__radio" type="radio" id="huey" name="#" value="huey">
      <label for="huey">Huey</label>
    </div>
    <div class="radio-box__item">
      <input class="radio-box__radio" type="radio" id="dewey" name="#" value="dewey">
      <label for="dewey">Dewey</label>
    </div>
    <div class="radio-box__item">
      <input class="radio-box__radio" type="radio" id="louie" name="#" value="louie">
      <label for="louie">Louie</label>
    </div>
  </div>

  <div class="check-box">
    <p class="check-box__label">チェックボックス</p>
    <div class="check-box__item">
      <input class="check-box__check" type="checkbox" id="item1" name="#" value="item1">
      <label for="item1">item1</label>
    </div>
    <div class="check-box__item">
      <input class="check-box__check" type="checkbox" id="item2" name="#" value="item2">
      <label for="item2">item2</label>
    </div>
    <div class="check-box__item">
      <input class="check-box__check" type="checkbox" id="item3" name="#" value="item3">
      <label for="item3">item3</label>
    </div>
  </div>

  <div class="textarea-box">
    <label class="textarea-box__label" for="js-textarea">複数行入力</label>
    <textarea name="info" id="js-textarea" class="textarea-box__textarea" cols="30" rows="5"></textarea>
  </div>


  <button type="submit" class="btn">大きさ可変ボタン</button>
  <button type="submit" class="btn btn--exsmall">exsmall</button>
  <button type="submit" class="btn btn--small">small</button>
  <button type="submit" class="btn btn--medium">medium</button>
  <button type="submit" class="btn btn--large">large</button>

  <br>

  <button type="submit" class="btn btn--transparent btn--link_transparent">カラーボタン</button>
  <button type="submit" class="btn btn--blue btn--link_blue">カラーボタン</button>
  <button type="submit" class="btn btn--orange btn--link_orange">カラーボタン</button>
  <button type="submit" class="btn btn--green btn--link_green">カラーボタン</button>
  <button type="submit" class="btn btn--red btn--link_red">カラーボタン</button>
  <button type="submit" class="btn btn--yellow btn--link_yellow">カラーボタン</button> -->


</main>

<?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>

<script>
var $w = $( window ).width();
var $dW = $('.bb8').css('width');
$dW = $dW.replace('px', '');
$dW = parseInt($dW);
var $dPos = 0;
var $dSpeed = 1;
var $dMinSpeed = 1;
var $dMaxSpeed = 4;
var $dAccel = 1.04;
var $dRot = 0;
var $mPos = $w - $w/5;
var $slowOffset = 120;
var $movingRight = false;

function moveDroid(){
  if($mPos > $dPos + ($dW/4)){
    // moving right
    if(!$movingRight){
      $movingRight = true;
      $('.antennas').addClass('right');
      $('.eyes').addClass('right');
    }
    if($mPos - $dPos > $slowOffset){
      if($dSpeed < $dMaxSpeed){
        // speed up
        $dSpeed = $dSpeed * $dAccel;
      }
    } else if($mPos-$dPos < $slowOffset){
      if($dSpeed > $dMinSpeed){
        // slow down
        $dSpeed = $dSpeed / $dAccel;
      }
    }
    $dPos = $dPos + $dSpeed;
    $dRot = $dRot + $dSpeed;
  } else if($mPos < $dPos - ($dW/4)){
    // moving left
    if($movingRight){
      $movingRight = false;
      $('.antennas').removeClass('right');
      $('.eyes').removeClass('right');
    }
    if($dPos - $mPos > $slowOffset){
      if($dSpeed < $dMaxSpeed){
        // speed up
        $dSpeed = $dSpeed * $dAccel;
      }
    } else if($dPos - $mPos < $slowOffset){
      if($dSpeed > $dMinSpeed){
        // slow down
        $dSpeed = $dSpeed / $dAccel;
      }
    }
    $dPos = $dPos - $dSpeed;
    $dRot = $dRot - $dSpeed;
  } else { }
  $('.bb8').css('left', $dPos);
  $('.ball').css({ WebkitTransform: 'rotate(' + $dRot + 'deg)'});
  $('.ball').css({ '-moz-transform': 'rotate(' + $dRot + 'deg)'});
}

setInterval(moveDroid, 10);

$( document ).on( "mousemove", function( event ) {
  $('h2').addClass('hide');
  $mPos = event.pageX;
  return $mPos;
});
</script>

</body>
</html>