<?php

class Connection{
  public string $host = "localhost";
  public string $username = "root";
  public string $password = "";
  public string $databaseName = "app";

  public $connection;

  public function connection(){
    try{
      $this->connection = new mysqli($this->host, $this->username, $this->password, $this->databaseName);
      if(!$this->connection){
        throw new Exception("database disconnected");
      }
      return $this->connection;
    } catch (Exception $error){
      echo $error->getMessage();
    }
  }
}