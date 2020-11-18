<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');

$page = 'addcafe';
define("title" ,"朝カフェ登録画面");

?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
  <section class="cafe-add">
    <div class="section-inner">
    <div id="input-test">
      入力が面倒な方はこちらをクリック!!<br>
      画像は好きな画像を選択してください😆
    </div>
      <form action="cafe_add_check.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <label class="input-box__label" for="js-input-store_name">店名<span class="required">※必須</span></label>
          <input id="js-input-store_name" class="input-box__input" type="text" name="store_name" autocomplete="off" autofocus >
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-station">最寄駅<span class="required">※必須</span></label>
          <input id="js-input-station" class="input-box__input" type="text" name="station" autocomplete="off">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-open_time">開店時間<span class="required">※必須</span></label>
          <input id="js-input-open_time" class="input-box__input" type="text" name="open_time" autocomplete="off" placeholder="8:00 オープン">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-store_memo">一言コメント<span class="required">※必須</span></label>
          <input id="js-input-store_memo" class="input-box__input" type="text" name="store_memo" autocomplete="off">
        </div>
        <div class="input-box">
          <label class="input-box__label" for="js-input-store_address">住所</label>
          <input id="js-input-store_address" class="input-box__input" type="text" name="store_address" autocomplete="off">
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
          <label class="textarea-box__label" for="js-input-store_menu">メニュー</label>
          <textarea name="menu" id="js-input-store_menu" class="textarea-box__textarea" cols="30" rows="5"></textarea>
        </div>
        <div class="input-box">
          <label  class="input-box__label" for="js-input-store_pass">編集・削除用パスワード<span class="required">※必須</span></label>
          <input id="js-input-store_pass" class="input-box__input" type="password" name="pass">
        </div>
        <dl class="file-box">
          <dt class="file-box__title">店舗画像</dt>
          <dd class="file-box__data"><input id="gazou" type="file" name="gazou" onchange="loadImage(this);"></dd>
          <dd><p id="preview"></p></dd>
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

<script>
function loadImage(obj)
{
	document.getElementById('preview').innerHTML = '<p>プレビュー</p>';
	for (i = 0; i < obj.files.length; i++) {
		var fileReader = new FileReader();
		fileReader.onload = (function (e) {
			document.getElementById('preview').innerHTML += '<img src="' + e.target.result + '">';
		});
		fileReader.readAsDataURL(obj.files[i]);
	}
}
</script>
<script>
  function randomNumber(start, end) {
    return Math.floor(Math.random()*(end-start+1)+start);
}
$('#input-test').on('click', function() {
      //送信データをObject変数で用意
    //参考URL:https://api.gnavi.co.jp/api/manual/restsearch/
    const data = {
        keyid: "518af56caf9e05fca65c4914cc5d1cfb",
        areacode_s: `AREAS21${randomNumber(11,99)}`
    };
    //Ajax（非同期通信）
    axios.get('https://api.gnavi.co.jp/RestSearchAPI/v3/', {
        params:data
    })
    .then(function (response) {
      console.log(response.data);
        //データ受信成功！！showData関数にデータを渡す
        $('#js-input-store_name').val(response.data.rest[randomNumber(1,9)].name);
        $('#js-input-station').val(response.data.rest[randomNumber(1,9)].access.station);
        $('#js-input-open_time').val(['8:00 オープン']);
        $('#js-input-store_memo').val(response.data.rest[randomNumber(1,9)].pr.pr_short);
        $('#js-input-store_address').val(response.data.rest[randomNumber(1,9)].address);
        $('#js-input-store_menu').val(['てすと店舗']);
        $('#js-input-store_pass').val(['aaaa']);
    }).catch(function (error) {
        console.log(error);//通信Error
    }).then(function () {
        //console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
    });

});

</script>
</body>
</html>