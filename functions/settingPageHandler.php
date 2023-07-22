<?php
$toAccountSection = null;
$toThemeSection = null;

if (isset($_POST["toAccountSection"])) {
  $toAccountSection = "active";
  $message = "this is account";
}

if (isset($_POST["toThemeSection"])) {
  $toThemeSection = "active";
  $message = "this is theme";
}
?>