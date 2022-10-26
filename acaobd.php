<?php

define ('DB_HOST','localhost');
define ('DB_USER','root');
define ('DB_PASSWORD','');
define ('DB_DB','agenda');
define ('DB_PORT','3306');
define ('MYSQL_DSN',"mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_DB.";charset=utf8");

try {
    $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

    // montar consulta
    $consulta = 'SELECT * FROM contato';

    //prepara a consulta para executar
    $comando = $conexao->prepare($consulta);

    // executa a consulta
    $comando->execute();

    // pega o retorno da consulta
    $listacontatos = $comando->fectchAll();

    echo "<table>";
    foreach($listacontatos as $contato){
        echo "<tr>";
        echo "<td>".$contato['id']."</td><td>".$contato['nome']."</td><td>".$contato['email']."</td><td>".$contato['idade']."</td><td>".$contato['data']."</td><td>".$contato['parente']."</td><td>".$contato['local'];
        echo "</tr>";
    }

    
}catch(PDOExeption $e){
    print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
    die();
}
