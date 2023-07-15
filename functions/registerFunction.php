<?php

session_start();
$_SESSION["differenceUsername"] = null;

spl_autoload_register(function ($class) {
  require_once "../database/" . $class . ".php";
});

if (isset($_SESSION["loginDatas"])) {
  header("location: ../index.php");
}

class Register extends Connection
{
  public function __construct(public string $usersUsername, public string $usersPassword)
  {
    $this->usersUsername = htmlspecialchars($this->connection()->real_escape_string($usersUsername));
    $this->usersPassword = htmlspecialchars($this->connection()->real_escape_string(password_hash($usersPassword, PASSWORD_BCRYPT)));

    $checkUsernameQuery = "SELECT id, username FROM user WHERE username = ?";
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

        mysqli_query($this->connection(), "INSERT INTO otp(usersOtp, otp) VALUE('$this->usersUsername', '000000')");

        $_SESSION["loginDatas"] = [
          "status" => true,
          "usersUsername" => $this->usersUsername
        ];

        header("location: ../index.php");
      }
    }
  }
}

if (isset($_POST["daftarButton"])) {
  $daftar = new Register($_POST["username"], $_POST["password"]);
}
