<?php

require_once "../database/connection.php";

session_start();

class LoginValidateUsername extends Connection
{
  public string $loginValidateUsername;

  public function __construct(public string $usersUsername)
  {
    $this->usersUsername = htmlspecialchars($this->connection()->real_escape_string($usersUsername));

    $checkUsernameQuery = "SELECT username FROM user WHERE username = ?";
    $checkUsernamePreparedStatement = new mysqli_stmt($this->connection());

    if ($checkUsernamePreparedStatement->prepare($checkUsernameQuery)) {
      $checkUsernamePreparedStatement->bind_param("s", $this->usersUsername);
      $checkUsernamePreparedStatement->execute();
      $result = $checkUsernamePreparedStatement->get_result();

      if ($result->num_rows == 1) {
        $this->loginValidateUsername = true;
        $_SESSION["loginValidateUsername"] = [
          "status" => true,
          "usersUsername" => $this->usersUsername
        ];
        header("location: loginPasswordValidation.php");
        return $this->usersUsername;
      } else {
        $this->loginValidateUsername = false;
      }
    }
  }
}

if (isset($_POST["submitButton"])) {
  $loginValidateUsername = new LoginValidateUsername($_POST["username"]);
}
