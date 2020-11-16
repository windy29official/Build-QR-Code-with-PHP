<?php

  define('HOST','localhost');
  define('USER','root');
  define('PASS','');
  define('DB','qrcode');
  $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>