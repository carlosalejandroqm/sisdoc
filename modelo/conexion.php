<?php
  class Conexion{

    public function connect(){
      $con = null;
      try {
          $con = new PDO('mysql:host=localhost; dbname=sisdoc', 'root', '');
          // Errores
          $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // Caracteres utf8
          $con->exec("SET CHARACTER SET utf8");
      } catch(Exception $e) {
          $con = "ERROR";
      } finally {
          return $con;
      }
    }
  }
?>