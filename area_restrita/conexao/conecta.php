<?php
    try{
        $conexao = new PDO('mysql:host=localhost;dbname=DB_cursinhoferradura','root','mysql');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("SET CHARACTER SET utf8");
    }catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }
?>