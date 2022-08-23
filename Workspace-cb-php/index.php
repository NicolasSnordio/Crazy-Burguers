<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>

  <?php

    if(!isset($_SESSION['login'])){
      
        if(isset($_POST['acao']) ){
            $login = 'usuario';
            $senha = '123456';

            $loginForm = $_POST['login'];
            $senhaForm = $_POST['senha'];

            if($login == $loginForm && $senha == $senhaForm){
                //Quando logar com sucesso
                $_SESSION['login'] = $login;
                header('location: index.php');
            }else{
                //Quando aconteer algum erro
                echo 'Dados inseridos estão incorretos.';
            }
        }

        include('login.php');
    }else{
        if(isset($_GET['logout'])){
            unset($_SESSION['login']);
            session_destroy();
            header('location: index.php');
        }
        include('home.php');
    }

  ?>

</body>

</html>