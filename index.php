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
<?php
require('connect.php'); // подключаемся к БД

if (isset($_POST['username']) && isset($_POST['password'])) { // проверка на введение данных
   $username = $_POST['username']; // Записываем в перменную значение введённое в поле
   $email = $_POST['email']; // Записываем в перменную значение введённое в поле
   $password = $_POST['password']; // Записываем в перменную значение введённое в поле

   $query = "INSERT INTO users (username, email, password) VALUES ('username', 'email', 'password')"; // записываем в переменную скрипт
   $result = mysqli_query($connection, $query); // записываем результат в БД

   if($result){// скрипт уведомление о регистрации
      $positive = "Вы зарегестрировались";
   } else {
      $negative = "Ошибка";
   }

}
?>
   <div class="container">
      <form class="form-signin" method="POST"></form>
         <h2>Регистрация</h2>

         <?php if(isset($positive)){ ?><div class="alert alert-success" role="alert"> <?php echo $positive; ?> </div><?php }?>
         <?php if(isset($negative)){ ?><div class="alert alert-danger" role="alert"> <?php echo $negative; ?> </div><?php }?>

         <input type="text" name="username" class="form-control" placeholder="Имя пользователя" required>
         <input type="email" name="email" class="form-control" placeholder="E-mail" required>
         <input type="password" name="password" class="form-control" placeholder="Пароль" required>
         <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
         <a href="login.php" class="btn btn-lg btn-primary btn-block">Войти</a>
   </div>
</body>
</html>