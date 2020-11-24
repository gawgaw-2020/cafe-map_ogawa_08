<?php

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

function redirect($file_name) {
  header('Location:' .$file_name);
  exit();
}

?>