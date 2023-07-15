<?php

session_start();

spl_autoload_register(function ($class) {
  require_once "../database/" . $class . ".php";
});

$login = null;
$CheckOTPInput = null;

class UsernameVerification extends Connection
{
  public static $wrongUsername = null;

  public function __construct(public string $usersUsername)
  {
    $this->usersUsername = htmlspecialchars($this->connection()->real_escape_string($usersUsername));

    $loginQuery = "SELECT username FROM user WHERE username = ?";
    $loginPreparedStatement = new mysqli_stmt($this->connection());

    if ($loginPreparedStatement->prepare($loginQuery)) {
      $loginPreparedStatement->bind_param("s", $this->usersUsername);
      $loginPreparedStatement->execute();
      $result = $loginPreparedStatement->get_result();

      self::$wrongUsername = null;

      if ($result->num_rows == 1) {
        self::$wrongUsername = false;
        $_SESSION["username"] = $this->usersUsername;
      } else {
        self::$wrongUsername = true;
      }
    }
  }
}

class getOTP extends Connection
{
  public string $OTPCode;

  public function getOTPCode()
  {
    $OTPCode = (string)rand(100_000, 999_999);
    $this->OTPCode = $OTPCode;

    $part1 = substr($OTPCode, 0, 3);
    $part2 = substr($OTPCode, 3);

    $OTPCode = $part1 . "&nbsp" . $part2;

    $usersUsername = $_SESSION["username"];

    try {
      if (!$this->connection()->query("UPDATE otp SET otp = '$this->OTPCode' WHERE usersOtp = '$usersUsername'")) {
        throw new Exception("something wrong in updating otp");
      }
    } catch (Exception $error) {
      echo $error->getMessage();
    }

    return [$OTPCode, $this->OTPCode];
  }
}

class CheckOTPInput extends Connection
{
  public string $usersOTPInput;
  public string $wrongOTP;

  public function CheckOTPInput(string $usersOTPInput)
  {
    $this->usersOTPInput = htmlspecialchars($this->connection()->real_escape_string($usersOTPInput));

    $checkOTPCodeQuery = "SELECT otp FROM otp WHERE otp = ?";
    $checkOTPCodePreparedStatement = new mysqli_stmt($this->connection(), $checkOTPCodeQuery);

    if ($checkOTPCodePreparedStatement->prepare($checkOTPCodeQuery)) {
      $checkOTPCodePreparedStatement->bind_param("s", $this->usersOTPInput);
      $checkOTPCodePreparedStatement->execute();
      $result = $checkOTPCodePreparedStatement->get_result();

      if ($result->num_rows == 1) {
        $_SESSION["validOtpDatas"] = [
          "status" => true,
          "usersUsername" => $_SESSION["username"]
        ];

        header("location: changePassword.php");
      } else {
        return $this->wrongOTP = true;
      }
    }
  }
}

if (isset($_POST["submitButton"])) {
  $login = new UsernameVerification($_POST["username"]);
}

$OTPCode = new getOTP;

if (isset($_POST["submitOTPButton"])) {
  $CheckOTPInput = new CheckOTPInput;
  $CheckOTPInput->CheckOTPInput($_POST["OTPInput"]);
}
