<?php
    session_start('verificaUsuario');
    ob_start();
    include("conexao/conecta.php");
    if(!isset($_SESSION['cpfUser']) && !isset($_SESSION['senhaUser'])){
      $redirect = "index.php";
      header("location:$redirect");
    }
    if(isset($_REQUEST['logout'])){
      session_destroy();
      session_unset(['cpfUser']);
      session_unset(['senhaUser']);
      $redirect = "index.php";
      header("location:$redirect");
    }
    if(isset($_POST['cadastrarAprovacao'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $insert = "INSERT INTO Aprovacoes VALUES (DEFAULT, '" . $nome . "', '" . $descricao . "')";
        try{
            $result = $conexao->exec($insert);
            $redirect = "home.php";
            header("location:$redirect");
        }catch(PDOException $e){
            echo $e;
        }
    }
    if(isset($_POST['cadastrarColaborador'])){
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $descricao = $_POST['descricao'];
        $funcao = "COLABORADOR";
          $_UP['pasta'] = 'upload/';
          $_UP['renomeia'] = true;
          if ($_UP['renomeia'] == true) {
            $nome_final = md5(time()).'.jpg';
            $nomeFinalMD5 = $nome_final;
          }else {
            $nome_final = $_FILES['arquivo']['name'];
          }
          if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            $redirect = "home.php";
            header("location:$redirect");
          } else {
            echo "Não foi possível enviar o arquivo, tente novamente!";
          }

        $insert = "INSERT INTO Usuario VALUES ('" . $email . "','" . $nome . "','" . $senha . "','" . $funcao . "','" . $descricao . "' , '" . $nomeFinalMD5 . "')";
        try{
            $result = $conexao->exec($insert);
            $redirect = "home.php";
            header("location:$redirect");
        }catch(PDOException $e){
            echo $e;
        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Área Restrita - Cursinho Ferradura</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">
                        <img src="assets/img/logo-ferradura.png" />

                    </a>
                    
                </div>
              
                
            </div>
        </div>
        <!-- /. NAV SIDE  -->            
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div style="background-color: #00A88F;">
                             <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                             </strong>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                    <div class="row text-center pad-top">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <div class="div-square">
                                     <a href="#" data-toggle="modal" data-target="#modalColaboradores" >
                                  <i class="fa fa-users fa-5x"></i>
                                  <h4>Colaboradores</h4>
                                  </a>
                                </div>  
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <div class="div-square">
                                     <a href="#" data-toggle="modal" data-target="#modalAprovacoes">
                                  <i class="fa fa-check fa-5x"></i>
                                  <h4>Aprovações</h4>
                                  </a>
                                </div>  
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <div class="div-square">
                                     <a href="logout.php" >
                                  <i class="fa fa-sign-out fa-5x"></i>
                                  <h4>Sair</h4>
                                  </a>
                                </div>  
                            </div>
                        </div>
              </div>
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>

          
      <!-- Modal Inscrições -->
      <div class="modal fade" id="modalInscricoes" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Inscrições - Cursinho Ferradura</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
          </div>
          
        </div>
      </div>
      <!-- Modal Colaboradores -->
      <div class="modal fade" id="modalColaboradores" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Colaboradores - Cursinho Ferradura</h4>
            </div>
            <div class="modal-body">
                                    
                    <form method="POST" action="#" enctype="multipart/form-data" >
                  <div class="form-group">
                    <label for="usr">Email do Colaborador:</label>
                    <input name="email" type="text" class="form-control" id="usr" autocomplete="off" >
                    <label for="usr">Nome do Colaborador:</label>
                    <input name="nome" type="text" class="form-control" id="usr" autocomplete="off" >
                    <label for="usr">Senha do Colaborador:</label>
                    <input name="senha" type="password" class="form-control" id="usr" autocomplete="off" >
                    <label for="comment">Descrição:</label>
                    <textarea name="descricao" class="form-control" rows="5" id="comment" autocomplete="off" ></textarea>
                    <label for="usr">Imagem:</label>
                    <input name="arquivo" type="file" class="form-control" id="usr" autocomplete="off" >
                    
                  </div>
                    <button name="cadastrarColaborador" class="btn btn-success">Cadastrar</button>

                    <!--<input type="text" name="nome"/>
                    <input type="text" name="descricao"/>
                    <button name="cadastrarAprovacao">Cadastrar</button>-->
                  </form> 
            </div>
          </div>
          
        </div>
      </div>
      <!-- Modal Aprovações -->
      <div class="modal fade" id="modalAprovacoes" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Aprovações - Cursinho Ferradura</h4>
            </div>
            <div class="modal-body">
                      
                  <form method="POST" action="#" enctype="multipart/form-data" >
                <div class="form-group">
                  <label for="usr">Nome:</label>
                  <input name="nome" type="text" class="form-control" id="usr" autocomplete="off" >
                  <label for="comment">Descrição:</label>
                  <textarea name="descricao" class="form-control" rows="5" id="comment" autocomplete="off" ></textarea>
                </div>
                  <button name="cadastrarAprovacao" class="btn btn-success">Cadastrar</button>

                  <!--<input type="text" name="nome"/>
                  <input type="text" name="descricao"/>
                  <button name="cadastrarAprovacao">Cadastrar</button>-->
                </form> 
            </div>
           
             
          </div>
          
        </div>
      </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
