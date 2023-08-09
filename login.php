<?php
require_once('db.php');

$login = $_POST['email'];
$pass = $_POST['password'];

if(empty($login) || empty($pass))
{
    echo "Поля не могут быть пустыми";
} else {
    $sql = "SELECT * FROM users WHERE email = '$login' AND password = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc()){
        //echo "Добро пожаловать ". $row['email'];
         // Перенаправление на другую страницу
         header('Location: success.html');
         exit();
      }  
    } else {
        echo "Такой пользователь отсутствует";
         // Перенаправление на другую страницу
         header('Location: index_too.html');
         exit();
         
    }
}