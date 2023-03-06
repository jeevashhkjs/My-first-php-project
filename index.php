<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=employersDetails", "root", "welcome");
}catch(Exception $e){
    echo "connection error".$e.getmessage();
}

$name = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['mail'];
$web = $_POST['web'];
$address = $_POST['address'];
$gender = $_POST['gender'];

try{

    $sql = $conn -> prepare("INSERT INTO employees (name,lastName,mail,website,address,gender) value ('$name','$lname','$mail','$web','$address','$gender')");
    $sql -> execute();

}catch(Exception $e){
    echo "Recorded not ok";
}

try{

    $fetch = $conn -> prepare("SELECT * FROM employees");
    $fetch -> execute();

    $values = $fetch -> fetchAll(PDO::FETCH_OBJ);

}catch(Exception $e){
    echo "no record found error";
}

require 'index.html';
require 'datas.html';
?>