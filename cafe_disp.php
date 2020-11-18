<?php

$page = 'dispcafe';
define("title" ,"朝カフェ一覧画面");

// csvの1列目をキーにした連想配列を返す（引数：csvファイルのパス）
function csvToArray($csvPath){
  $csvArray = array();
  $firstFlg = true;
  $keys = array();
  $count = 0;
  $file = fopen($csvPath, 'r');

  while ($line = fgetcsv($file)) {
    if($firstFlg){
      for($i = 0; $i < count($line); $i++){
        array_push($keys,$line[$i]);
      }
      $firstFlg = false;
    }else{
      for($i = 0; $i < count($line); $i++){
        $csvArray[$count][$keys[$i]] = $line[$i];
      }
      $count++;
    }
  }
  fclose($file);
  return $csvArray;
}

$cafe_data = csvToArray("./AutoCreateCsv/test.csv");

?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
  <section class="cafe-disp">
    <div class="section-inner">
      <h1 class="level1-heading">朝カフェ</h1>
      <ul class="store-list">
        <?php foreach ($cafe_data as $value): ?>
          <li class="store-card">
            <p class="store-card__image"><img src="/cafe-map_ogawa_08/assets/img/srore_img/<?php echo $value['pro_gazou'] ?>"></p>
            <div class="store-card__detail">
              <div class="detail-left">
                <p class="store-card__name"><?php echo $value['store_name'] ?></p>
                <p class="store-card__memo"><?php echo $value['store_memo'] ?></p>
              </div>
              <div class="detail-right">
                <p class="store-card__open-time"><?php echo $value['open_time'] ?></p>
              </div>
            </div>
            <div class="store-card__footer">
              <p class="store-card__station">最寄駅<span><?php echo $value['station'] ?></span></p>
              <p class="store-card__wifi">Wifi<span><?php echo $value['wifi'] ?></span></p>
              <p class="store-card__power-source">電源<span><?php echo $value['power_source'] ?></span></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
</main>
<script>
  var $grid = $('.store-list'),   
    emptyCells = [],
    i;

    // アイテム (li.item) の数だけ空のアイテム (li.cell.is-empty) を生成
    for (i = 0; i < $grid.find('.store-card').length; i++) {
        emptyCells.push($('<li>', { class: 'store-card is-empty' }));
    }

    $grid.append(emptyCells);
</script>
</body>
</html>