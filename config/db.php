<?php
//connect db
$conn = mysqli_connect('localhost','bamiji','test1234','bincomphptest');


//check connection

if(!$conn){
echo 'connection error :' . mysqli_connect_error();
}

?>