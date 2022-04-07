<?php
  session_start();

  $code = isset($_GET['code'])?$_GET['code']:'';

  include_once 'securimage.php';
  $securimage = new Securimage();
  if (!$securimage->check($code)) {
    echo 'invalido';
  } else{
    echo 'valido';
  }
?>
