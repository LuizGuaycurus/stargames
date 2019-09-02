<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/index1.css" type="text/css">
        <link rel="stylesheet" href="assets/css/index2.css" type="text/css">
        <link rel="stylesheet" href="assets/css/cadastro-login.css" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="icon" href="assets/img/star.png"/>
		<title>StarGames</title>
	</head>
	<body>
	<!---menu navbar---------------->
	
		<nav class="navbar navbar-expand-lg" style="background-color:#1C1C1C;height: 105px;">
			<div class="container">
                <a class="navbar-brand" href="index1.php">
                    <img src="assets/img/starlogo.png" width="80" height="80" alt="">
                  </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
				<span class="navbar-toggler-icon" style="color:white;"><i class="fas fa-bars"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <div class="nov2">
                            <li class="nav-item active">
                                <a class="nav-link" href="index1.php">STAR <span class="sr-only">(current)</span></a>
                            </li>
                        </div>
                    </ul>

                    <ul class="navbar-nav mr-auto ml-5 nov4">
                        <div class="nov4 row">
						<li class="nav-item">
							<a class="nav-link" href="analises.php">Análises</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="todosjogos.php">Todos os jogos</a>
						</li>
                        </div>
					</ul>
                    </div>
			</div>
		</nav>
        <!---banner -->
        <div style="height:50px;background: linear-gradient(to right, #b72150 0%,#dd551f 100%);">
                </div>    
            </div>
        </div>
       

		<br><br>
        <!----adm--->
        <center><h1>Página do Administrador</h1></center>
        <br><br>
        <?php
        // $connect = mysqli_connect('localhost','root','','star');

        $host = "localhost";
        $db   = "star";
        $user = "root";
        $pass = "";
        // conecta ao banco de dados
        $con = mysqli_connect($host, $user, $pass,$db); 
        // seleciona a base de dados em que vamos trabalhar
        mysqli_select_db($con,$db);

        $query = sprintf("SELECT idUsuario, nome, email, senha FROM usuario");
        // executa a query
        $dados = mysqli_query($con,$query);
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        // calcula quantos dados retornaram
        $total = mysqli_num_rows($dados);

        // se o número de resultados for maior que zero, mostra os dados
        if($total > 0) {
        
        // inicia o loop que vai mostrar todos os dados
        do {
            $id=$linha['idUsuario'];
        ?>
         
        <center>
        <table style="width:50%" class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Senha</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th><?=$linha['idUsuario']?></th>
            <th><?=$linha['nome']?></th>
            <th><?=$linha['email']?></th>
            <th><?=$linha['senha']?></th>
            <th><form method="post"><button type="submit" class="btn btn-danger">
            <input type="hidden" name="excluir" value="<?= $linha["idUsuario"] ?>">&#10005;</button></form></td>
            <?php 
                if(isset($_POST['excluir']) && filter_input(INPUT_POST, 'excluir', FILTER_VALIDATE_INT) !== false){

                    $id = mysqli_real_escape_string($con, $_POST['excluir']);
                
                    $sql2= "delete from usuario where idUsuario='$id'";
                    $qry2= mysqli_query($con,$sql2);
                
                }
            ?>    
        </tr>
        </tbody>
        </table>
        </center>
        <?php
        // finaliza o loop que vai mostrar os dados
        }while($linha = mysqli_fetch_assoc($dados));
        // fim do if 
        
        }

        ?>
        <!---footer---------------->
    <div style="height:50px;background: linear-gradient(to right, #b72150 0%,#dd551f 100%);"></div>
	<footer id="footer" style="background-color:#1C1C1C;">
        <br>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 info">
                        <center>
                        <h1>Star Games</h1>
                        <p style="font-family: 'Segoe UI light', Tahoma, Verdana, sans-serif,serif;font-weight: 700;">Um site criado por gamers, para gamers.</p>
                        </center>
                    </div>
                    <div class="col-lg-4 col-md-4 footer-links">
                        <center>
                        <div class="nov5">
                            <ul class="navbar-nav">
                                <li class="nav-item"><i class="ion-ios-arrow-right"></i><a href="index1.php">Home</a></li>
                                <li class="nav-item"><i class="ion-ios-arrow-right"></i><a href="analises.php">Análises</a></li>
                                <li class="nav-item"><i class="ion-ios-arrow-right"></i><a href="todosjogos.php">Jogos</a></li>
                                <li class="nav-item"><i class="ion-ios-arrow-right"></i><a href="#">Login</a></li>
                            </ul>
                        </div>
                        </center>
                    </div>
                    <div class="col-lg-4 col-md-4 footer-contact">
                        <center>
                        <h2 class="info">Siga-nos!</h2>
                        <div class="nov6">
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="git"><i class="fab fa-github"></i></a>
                        </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <br><br>
        <p class="copyright text-muted" style="color:white;">Copyright &copy;Star Games 2018</p>
        </center>
	</footer>
	
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
	</body>
</html>