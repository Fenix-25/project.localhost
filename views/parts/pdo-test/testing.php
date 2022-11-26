<?php

require_once './config/constants.php';

require_once 'form.html';
echo "<h1>PDO TESTING</h1>";
try {


    echo '<pre>';
} catch (Exception $exception) {
    echo $exception->getMessage();
}


function is_exist()
{

}

function addUser()
{
    $query = connectDb()->prepare("INSERT INTO users('name', 'username','email', 'password') VALUES (:name, :username, :email, :password)");

}


