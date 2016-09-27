<?php
    include("conexao/conecta.php");
    session_start('verificaUsuario');
    ob_start();
    if(isset($_SESSION['cpfUser']) && isset($_SESSION['senhaUser'])){
      $redirect = "home.php";
      header("location:$redirect");
    }
    if(isset($_POST['logar'])){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $select = "SELECT * FROM Usuario WHERE CPF=:cpf AND Senha=:senha";
        try{
            $result = $conexao->prepare($select);
            $result->bindParam(':cpf', $cpf, PDO::PARAM_STR); 
            $result->bindParam(':senha', $senha, PDO::PARAM_STR);
            $result->execute();
            $count = $result->rowCount(); 
            if($count==1){
                $_SESSION['cpfUser'] = $cpf;
                $_SESSION['senhaUser'] = $senha;
                header("Refresh: 1, home.php");
            }
        }catch(PDOException $e){
            echo $e;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Victor Hugo Braguim Canto">
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<title> Área do Aluno - Cursinho Ferradura</title>
</head>
<body>
	<!-- Topo -->
	<div id="topo">
		<img width="350px" height="400px" src="imagens/logo-cursinho.png" alt="Cursinho Ferradura"></img>
	</div>
	<div class="centerLogin">
            <form method="POST" action="#" enctype="multipart/form-data" name="frmLogin">
                <div class="emailLogin formularioLogin">
                    <input type="text" name="cpf" placeholder="Digite o seu login" autocomplete="off" required="required"/>
                </div>
                <div class="senhaLogin formularioLogin">
                    <input type="password" name="senha" placeholder="●●●●●●●●●●●●●●●●" autocomplete="off" required="required" />
                </div>
                <div class="btnLogin">
                	<input name="logar" type="submit" value="Entrar" class="btnSubmitLogin" />
                </div>
            </form>
    </div>
</body>
</html>