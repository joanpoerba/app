<?php

session_start();
$_SESSION["differenceUsername"] = null;

spl_autoload_register(function ($class) {
  require_once "../database/" . $class . ".php";
});

class Register extends Connection
{
  public function __construct(public string $usersUsername, public string $usersPassword)
  {
    $this->usersUsername = htmlspecialchars($this->connection()->real_escape_string($usersUsername));
    $this->usersPassword = htmlspecialchars($this->connection()->real_escape_string(password_hash($usersPassword, PASSWORD_BCRYPT)));

    $checkUsernameQuery = "SELECT username FROM user WHERE username = ?";
    $checkUsernamePreparedStatement = new mysqli_stmt($this->connection(), $checkUsernameQuery);

    if ($checkUsernamePreparedStatement->prepare($checkUsernameQuery)) {
      $checkUsernamePreparedStatement->bind_param("s", $usersUsername);
      $checkUsernamePreparedStatement->execute();
      $result = $checkUsernamePreparedStatement->get_result();

      if ($result->num_rows == 1) {
        $_SESSION["differenceUsername"] = false;
      } else {
        $_SESSION["differenceUsername"] = true;
      }
    }

    if ($_SESSION["differenceUsername"] == true) {
      $insertQuery = "INSERT INTO user(username, password) VALUE(?, ?)";
      $insertPreparedStatement = new mysqli_stmt($this->connection(), $insertQuery);

      if ($insertPreparedStatement->prepare($insertQuery)) {
        $insertPreparedStatement->bind_param("ss", $this->usersUsername, $this->usersPassword);
        $insertPreparedStatement->execute();
        $_SESSION["loginStatus"] = true;
        $_SESSION["usersUsername"] = $this->usersUsername;
        $_SESSION["usersPassword"] = $this->usersPassword;
        header("Location: ../view/main.php");
      }
    }
  }
}

if (isset($_POST["daftarButton"])) {
  $daftar = new Register($_POST["username"], $_POST["password"]);
}
