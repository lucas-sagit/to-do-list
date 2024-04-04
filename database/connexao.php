<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'to_do';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
} catch(PDOException $e){
    echo 'Erro ' . $e->getMessage();
}

?>