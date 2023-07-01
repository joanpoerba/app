<?php

require_once "../database/connection.php";

session_start();

if ($_SESSION["loginValidateUsername"]["status"] !== true) {
  header("location: loginUsernameValidation.php");
}

class LoginValidatePassword extends Connection
{
  public string $loginValidatePassword;

  public function __construct(public string $usersPassword)
  {
    $this->usersPassword = htmlspecialchars($this->connection()->real_escape_string($usersPassword));

    $checkPasswordQuery = "SELECT password FROM user WHERE username = ?";
    $checkPasswordPreparedStatement = new mysqli_stmt($this->connection());

    if ($checkPasswordPreparedStatement->prepare($checkPasswordQuery)) {
      $checkPasswordPreparedStatement->bind_param("s", $_SESSION["loginValidateUsername"]["usersUsername"]);
      $checkPasswordPreparedStatement->execute();
      $result = $checkPasswordPreparedStatement->get_result();

      if ($result->num_rows == 1) {
        foreach ($result->fetch_assoc() as $fatchedUsersPassword) {
          if (password_verify($this->usersPassword, $fatchedUsersPassword)) {
            $this->loginValidatePassword = true;
            $_SESSION["usersDatas"] = [
              "status" => true,
              "usersUsername" => $_SESSION["loginValidateUsername"]["usersUsername"]
            ];
            header("location: main.php");
          } else {
            $this->loginValidatePassword = false;
          }
        }
      }
    }
  }
}

if (isset($_POST["loginButton"])) {
  $loginValidatePassword = new LoginValidatePassword($_POST["password"]);
}
