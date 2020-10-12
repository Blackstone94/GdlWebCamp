<?php
    echo 'php';
    $conn= new mysqli('localhost:8889','root','root','gdlwebcamp');
    if($conn->connect_error){
      echo $error ->$conn->connect_error;
    }
?>
