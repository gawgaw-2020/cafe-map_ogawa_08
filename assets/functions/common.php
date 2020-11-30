<?php

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

function redirect($file_name) {
  header('Location:' .$file_name);
  exit();
}

function random($length = 8)
{
  return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

?>