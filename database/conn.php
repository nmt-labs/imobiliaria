<?php
  try {
    $conn = mysqli_connect("localhost","root","","imobiliaria");    
  } catch (\Exception $erro) {
    echo $erro;
  }
?>