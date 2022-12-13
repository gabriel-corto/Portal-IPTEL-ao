<?php
//CONFIGURAÇÃO DO BANCO DE DADOS !!! MYSQL / PHPMYADMIN

//Nome Do Servidor //
$servidor = "localhost";

//Nome Do Usuário do Banco de Dados //
$usuario = "root";

//Senha do Banco de Dados //
$senha = "";

//Nome do Banco de Dados 
$banco = "iptel";

try {
    //Conexão Banco de Dados PDO

    $conn = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "<script>alert('A Conexão com O Banco de Dados Está ESTAVÉL!')</script>";


} catch (PDOException $e) {
    //throw $th;

    echo "Não Foi Posivel Conectar ao Banco de Dados !".$e->getMessage();


}

?>
