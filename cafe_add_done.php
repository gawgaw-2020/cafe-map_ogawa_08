<?php
session_start();

require_once (dirname(__FILE__) . '/assets/functions/common.php');

// ページ情報
$pagerole = 'addcafe';
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

header('Location: /cafe-map_ogawa_08/cafe_disp.php');
exit();


?>