<?php
class DB {
  private static $servername = "localhost";
  private static $username = "root";
  private static $password = "";
  private static $database = "veterinaria";

  private static function getConnection() {
    $mysql_conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);
    if ($mysql_conn->connect_error) die("Connection failed: " . $mysql_conn->connect_error);
    return $mysql_conn;
  }

  public static function query($query, ...$params) {
    $mysql_conn = self::getConnection();
    $sentencia = $mysql_conn->prepare($query);

    if (count($params) > 0) {
      $types = "";

      foreach ($params as $param) {
        if (is_int($param)) $types .= "i";
        else if (is_float($param)) $types .= "d";
        else if (is_string($param)) $types .= "s";
        else $types .= "b";
      }
  
      $sentencia->bind_param($types, ...$params);
    }

    if (!$sentencia->execute()) return NULL;

    $result = $sentencia->get_result();
    if (!$result) return NULL;

    $data = $result->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();
    $mysql_conn->close();
    return $data;
  }

  public static function queryGetId($query, ...$params) {
    $mysql_conn = self::getConnection();
    $sentencia = $mysql_conn->prepare($query);

    if (count($params) > 0) {
      $types = "";

      foreach ($params as $param) {
        if (is_int($param)) $types .= "i";
        else if (is_float($param)) $types .= "d";
        else if (is_string($param)) $types .= "s";
        else $types .= "b";
      }
  
      $sentencia->bind_param($types, ...$params);
    }
    
    $sentencia->execute();
    $sentencia = $mysql_conn->prepare("SELECT LAST_INSERT_ID() AS id;");
    $sentencia->execute();

    $result = $sentencia->get_result();
    if (!$result) return NULL;

    $data = $result->fetch_all(MYSQLI_ASSOC);

    $sentencia->close();
    $mysql_conn->close();
    return $data;
  }
}
?>