<?php
$host = 'localhost';
$dbname = 'db_test';
$username = 'root';
$password = '';
  

$dsn = "mysql:host=$host;dbname=$dbname"; 

//Creation du base de donness
try{
$sql = "CREATE DATABASE IF NOT EXIST db_test";

$pdo = new PDO($dsn, $username, $password);
 $stmt = $pdo->query($sql);
 
 if($stmt === true){
    echo "Creation de base des donnees avec succes ";
 }
}catch (PDOException $e){
    echo "Erreur de creation de database: " . $pdo->error;
  }


//Creation de table utilisateur
try{
    $sql = "CREATE TABLE IF NOT EXIST test_utilisateur(
        id INT(2) AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(250) NOT NULL,
        password VARCHAR(250) NOT NULL
    )";
    $pdo = new PDO($dsn, $username, $password);
     $stmt = $pdo->query($sql);
     
     if($stmt === true){
        echo "Creation de table utilisateur avec succes ";
     }
    }catch (PDOException $e){
        echo "Erreur de Creation de table utilisateur: " . $pdo->error;
      }

//Creation de table url, pour stocker l'url
try{
    $sql = "CREATE TABLE IF NOT EXIST table_url(
        id INT(2) AUTO_INCREMENT PRIMARY KEY,
        url VARCHAR(250) NOT NULL
    )";
    $pdo = new PDO($dsn, $username, $password);
     $stmt = $pdo->query($sql);
     
     if($stmt === true){
        echo "Creation de table url avec succes ";
     }
    }catch (PDOException $e){
        echo "Erreur de Creation de table qui stocke url: " . $pdo->error;
      }

// récupérer tous les listes des url
$sql = "SELECT * FROM table_url";
 
try{
 $pdo = new PDO($dsn, $username, $password);
 $stmt = $pdo->query($sql);
 
 if($stmt === false){
  die("Erreur");
 }
 
}catch (PDOException $e){
  echo $e->getMessage();
}


?>