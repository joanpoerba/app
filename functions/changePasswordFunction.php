<?php
session_start();

spl_autoload_register(function ($class) {
  require_once "../database/" . $class . ".php";
});

if($_SESSION["validOtpDatas"]["status"] !== true){
  header("location: fakeOTP.php");
}

if (isset($_SESSION["loginDatas"])) {
  header("location: ../index.php");
}

class ChangePassword extends Connection{
  function __construct(public string $changePassword)
  {
    $changePasswordQuery = "UPDATE user SET password = ? WHERE username = ?";
    $changePasswordPreparedStatement = new mysqli_stmt($this->connection(), $changePasswordQuery);

    $this->changePassword = password_hash($changePassword, PASSWORD_BCRYPT);

    if($changePasswordPreparedStatement->prepare($changePasswordQuery)){
      $changePasswordPreparedStatement->bind_param("ss", $this->changePassword, $_SESSION["validOtpDatas"]["usersUsername"]);
      $changePasswordPreparedStatement->execute();
    }

    if($changePasswordPreparedStatement->affected_rows > 0){
      header("location: login.php");
    }
  }
}

if(isset($_POST["changePasswordButton"])){
  $changePassword = new ChangePassword($_POST["password"]);
}
?>