<?php
    $username = 'root';
    $pwd = 'sti@6158';
    try{
        $conn = new PDO('mysql:host=localhost;dbname=ocorrencia',$username, $pwd);
    }catch(PDOException $e){
        echo 'Error:'. $e->getMessage();
    }

?>