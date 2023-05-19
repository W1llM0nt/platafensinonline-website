<?php

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$palavraChave = $_POST["palavraChave"];
$confPalavraChave = $_POST["confPalavraChave"];

$Host = "localhost";
$Nome_DB = "DB_PlatEnsinOnline";
$Utilizador = "root";
$Password = "";

$conn = mysqli_connect($Host, $Nome_DB, $Utilizador, $Password);
if (mysqli_connect_errno())
{
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO message(firstName, lastName, email, palavraChave, confPalavraChave)
        VALUES(?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql))
{
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii", $firstName, $lastName, $email, $palavraChave, $confPalavraChave);
mysqli_stmt_execute($stmt);

echo "Registado!"; 

?>