<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="">
    <input type="text" name="database">
    <input type="submit">
  </form>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $database = $_POST["database"];
      $host = "localhost";
      $username = "root";
      $password = "";

      if (!empty($_POST["database"])) {
        try {
          $connect = new PDO("mysql:host=$host", $username, $password);
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $connect->exec("CREATE DATABASE $database");
          echo "database successfully created!";
        } catch (PDOException) {
          echo "database name already exists!";
        }
      } else {
        echo "enter database name";
      }
    }
  ?>
</body>
</html>