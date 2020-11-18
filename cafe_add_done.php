<?php

require_once (dirname(__FILE__) . '/assets/functions/common.php');

// ページ情報
$page = 'addcafe';
define("title" ,"朝カフェ登録 -完了画面-");

// var_dump($_POST);

$store_name = $_POST['store_name'];
$station = $_POST['station'];
$open_time = $_POST['open_time'];
$store_memo = $_POST['store_memo'];
$store_address = $_POST['store_address'];
$wifi = $_POST['wifi'];
$power_source = $_POST['power_source'];
$menu = $_POST['menu'];
$pass = $_POST['pass'];
$pro_gazou = $_POST['gazou_name'];


function createCsv($data,$fileName){
  $dirPath = './AutoCreateCsv';
  if(!file_exists($dirPath)){
    mkdir($dirPath,0700);
  }
  $createCsvFilePath = $dirPath."/".$fileName.".csv";
  if(!file_exists($createCsvFilePath)){
    touch($createCsvFilePath);
  }
  $createCsvFile = fopen($createCsvFilePath, "a");
  if ($createCsvFile) {
    foreach($data as $line){
      fputcsv($createCsvFile, $line);
    }
  }
  fclose($createCsvFile);
}

$data = array(
  array($store_name, $station, $open_time, $store_memo, $store_address, $wifi, $power_source, $menu, $pass, $pro_gazou)
);

createCsv($data,'test');



?>
<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

<main>
登録が完了しました画面
<a class="btn btn--blue btn--link_blue" href="/cafe-map_ogawa_08/cafe_add.php">続けて登録する</a>
<a class="btn btn--transparent btn--link_transparent" href="/cafe-map_ogawa_08/cafe_disp.php">朝カフェ一覧へ</a>
</main>