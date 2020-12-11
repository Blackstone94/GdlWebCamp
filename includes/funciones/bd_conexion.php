<?php
//host, user, pass,db
    $conn= new mysqli('localhost','root','','gdlwebcamp');
    if($conn->connect_error){
      echo $error ->$conn->connect_error;
    }
    $conn->set_charset("utf8");
?>
