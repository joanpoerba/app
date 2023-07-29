<?php
$toAccountSection = null;
$toThemeSection = null;

if (isset($_POST["toAccountSection"])) {
  $toAccountSection = "active";
}

if (isset($_POST["toThemeSection"])) {
  $toThemeSection = "active";
}
?>