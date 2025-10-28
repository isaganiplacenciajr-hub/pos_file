<?php

try{

    $pdo = new PDO('mysql:host=localhost;dbname=pos_isagani_db','root','');

}catch(PDOException $e){

echo $e->getMessage();

}



//echo'connection success';




?>