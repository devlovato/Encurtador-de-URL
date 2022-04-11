<?php 
    require_once 'MetodosDAO.php';
    // include "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- LINK ICONES -->
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<title>Encurtador de URL</title>
</head>
<body>
<div class="container">
		<h1>🔗Encurtador de URL</h1>
		<form action="" method="post"> 
            <span class="iconify" data-icon="akar-icons:link-chain"></span>
			<input type="text" name="url" id="" class="input" placeholder="Adicione uma url Longa">
			<input type="submit" name="btn" value="Encurtar"> 
		</form>
        <?php
             if(isset($_POST['btn'])){
                 if(empty($_POST['url'])){
            ?>
              <div class='err'>DIGITE UMA URL!</div>
              <?php
                 }else{
                     $metodos = new MetodosDao;
                     $url = $_POST['url'];
                     //FILTRO QUE NAO DEIXA O USUARIO INSERIR TAG HTML NO CAMPO
                     $long_url = htmlentities($url, ENT_QUOTES);
                     $metodos->FazReq($long_url);
                 }
            }
        ?>
</div>
</body>
</html>

