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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Área do Aluno - Cursinho Ferradura</title>
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
                                     <a href="usuarios.php" >
                                  <i class="fa fa-users fa-5x"></i>
                                  <h4>Cadastrar Usuário</h4>
                                  </a>
                                </div>  
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <div class="div-square">
                                     <a href="usuarios.php" >
                                  <i class="fa fa-users fa-5x"></i>
                                  <h4>Cadastrar Aprovação</h4>
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
              </div> <br /><br />
                 <!-- /. ROW  -->   
				  <div class="row">

                    <div class="col-lg-12 ">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>CPF</th>
                              <th>Nome</th>
                              <th>Função</th>
                              <th>Descrição</th>
                              <th>Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>000.000.000-00</td>
                              <td>Victor Hugo Braguim Canto</td>
                              <td>Colaborador</td>
                              <td>Professor de Matemática</td>
                              <td><a href="usuarios.php?=deleteUser="><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            </tr>
                          </tbody>
                        </table>                     
                    </div>
              </div>
                  <!-- /. ROW  --> 

          

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
