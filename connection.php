<?php
$servername="server.com";
$username="";
$password="";
$dbname="";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if(!$connection)
{
    die("Erro ao estabalecer ligação à base de dados, " . mysqli_connect_error());
}
mysqli_set_charset($connection, "utf8");
?>
