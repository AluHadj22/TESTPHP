<?php
require_once('db.php');

$login = $_POST['login'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatpass = $_POST['repeatpass'];

// Проверка на уникальность почты, логина и телефона
$checkQuery = "SELECT * FROM users WHERE email = '$email' OR login = '$login' OR number = '$number'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    echo "Такой пользователь уже существует";
} else {
    if (empty($login) || empty($number) || empty($email) || empty($password) || empty($repeatpass)) {
        echo "Поле ввода не может быть пустым";
    } elseif ($password != $repeatpass) {
        echo "Пароли должны совпадать";
    } else {
        // Я не знаю как добавить Яндекс каптчу
        $sql = "INSERT INTO users (login, number, email, password) VALUES ('$login', '$number', '$email', '$password')";
        $conn->query($sql);
        // Перенаправление на другую страницу
        header('Location: success.html');
        exit();
    }

}