<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <title>PHP Module 25</title>
</head>
<body>

   <div class="container">
      <form class="form-signin" method="POST"></form>
         <h2>Авторизация</h2>

         <input type="text" name="username" class="form-control" placeholder="Имя пользователя" required>
         <input type="password" name="password" class="form-control" placeholder="Пароль" required>
         <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
         <a href="index.php" class="btn btn-lg btn-primary btn-block">Зарегистрироваться</a>
   </div>

   <?php
   require('connect.php'); // подключаемся к БД

   if (isset($_POST['username']) and isset($_POST['password'])) { // проверка на введение данных
   $username = $_POST['username']; // Записываем в перменную значение введённое в поле
   $password = $_POST['password']; // Записываем в перменную значение введённое в поле

   $query = "SELECT * FROM users WHERE username='$username' and password='$password'";// проверка подлинности юзера
   $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
   $count = mysqli_num_rows($result);// получаем чилсо рядов из выборки

   if ($count == 1){
      $_SESSION['username'] = $username; // начало сессии
   } else {
      $negative = "Ошибка";
   }
   }

   if (isset($_SESSION['username'])) {
      $username = $_SESSION['username']; // присваиваем переменной значение сессии
      echo "Привет" . $username . "";
      echo "<a href='logout.php' class='btn' > Выйти </a>";
   }
   ?>
</body>
</html>