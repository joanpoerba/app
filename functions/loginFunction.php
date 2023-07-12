<?php

session_start();

$date = new DateTime();
$date->setTimezone(new DateTimeZone("Asia/Jakarta"));

require_once "../database/connection.php";

if (isset($_COOKIE["ls"])) {
  if ($_COOKIE["ls"] == password_verify("true", $_COOKIE["ls"])) {
    $_SESSION["loginDatas"] = [
      "status" => true,
      "usersUsername" => $_COOKIE["uu"]
    ];
  }
}

if (isset($_SESSION["loginDatas"])) {
  header("location: ../index.php");
}

class Login extends Connection
{
  public string $usersId;
  public string $wrongUsername;
  public string $wrongPassword;

  public function __construct(public string $usersUsername, public string $usersPassword)
  {
    $this->usersUsername = htmlspecialchars($this->connection()->real_escape_string($usersUsername));
    $this->usersPassword = htmlspecialchars($this->connection()->real_escape_string($usersPassword));

    $loginQuery = "SELECT id, username, password FROM user WHERE username = ?";
    $loginPreparedStatement = new mysqli_stmt($this->connection());

    if ($loginPreparedStatement->prepare($loginQuery)) {
      $loginPreparedStatement->bind_param("s", $this->usersUsername);
      $loginPreparedStatement->execute();
      $result = $loginPreparedStatement->get_result();

      if ($result->num_rows == 1) {
        $this->wrongUsername = false;

        while ($data = $result->fetch_assoc()) {
          if (password_verify($this->usersPassword, $data["password"])) {
            $this->wrongPassword = false;

            $_SESSION["loginDatas"] = [
              "status" => true,
              "usersUsername" => $data["username"]
            ];

            if (isset($_POST["rememberMeButton"])) {
              // ! ls = loginStatus | value = "true"
              setcookie("ls", password_hash("true", PASSWORD_BCRYPT), time() + 60);
              // ! uu = usersUsername | value = username
              setcookie("uu", $data["username"], time() + 60);
            }

            header("location: ../index.php");
          } else {
            $this->wrongPassword = true;
          }
        }
      } else {
        $this->wrongUsername = true;
        $this->wrongPassword = true;
      }
    }
  }
}


if (isset($_POST["loginButton"])) {
  $login = new Login($_POST["username"], $_POST["password"]);
}
