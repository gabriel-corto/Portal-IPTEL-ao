<?php

    session_start();
    if(isset($_POST['btn-login'])){

        // SE EXISTIR TENTATIVA DE LOGIN
        
        //RECEBENDO O EMAIL DO POST !!!!
        $email = $_POST['email'];

        //RECEBENDO A SENHA ESCOLHIDO DO POST  !!!!
        $senha = $_POST['senha'];
        
        if(empty($email) || empty($senha)){
            //EXIBIR MENSAGEM DE ERRO!!!!!!!!!!
            $_SESSION['message'] = "<h5 class='alert alert-danger'>ATENÇÃO! Estes Campos São Obrigatórios!</h5> ";
            
        }

        //VERIFICAR SE O E-MAIL É VÁLIDO !!!
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['message'] = "<h5 class='alert alert-danger'>Endereço de E-mail Inválido !</h5> ";
        }

        //SE NÃO HOUVER NENHUM ERRO !!!
        else{
            //PERMITIR O LOGIN !!!!!
            $_SESSION['message'] = "<h5 class='alert alert-success'>PORFAVOR! Aguarde...</h5> ";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IPTEL - Entrar</title>

    <!--FAVICON-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/_bootstrap.min.css">

    <style>
        
        .container{
            box-shadow: unset;
            /* font-family: 'Poppins'; */
            
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Barlow&family=Fira+Sans:wght@500&family=Inter+Tight:wght@300&family=Open+Sans:wght@600&family=Roboto+Condensed&family=Rubik:wght@500&family=Signika+Negative:wght@700&family=Source+Sans+Pro:wght@600&display=swap');
        .alert{
            margin-top: 30px;
            font-size: 16px;
            font-family: 'Open Sans', sans-serif;
        }
        .alert-danger{
            font-size: 15px;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {justify-content: center; align-items: center; display: flex; height: 100%; height: 90vh;} 

        .container {
            text-align: center;
            padding: 60px;
            border-radius: 20px;
        }
        .container i {
            color:  rgb(148, 146, 146);
        }
        .container {
            width: 500px;
            height: 600px;
        }
        .container h3{
            font-size: 30px;
            font-family: 'Roboto', sans-serif;
        }
        .container span {
            color: #dc143c;
        }
        .container p {
            font-family: 'Open Sans', sans-serif;
            margin-top: 15px;
            letter-spacing: unset;
        }
        .mb-3{
            margin-top: 10px;
        }
        .container input {
            padding: 12px;
            width: 300px;
            margin-top: 5px;
            
            font-size: 15px;
            font-family: 'Open Sans', sans-serif;
            border: 0;
            border-bottom: 1px solid #ccc;
            color: rgb(148, 146, 146);

        
            
        }
        .container input:focus{
            outline: none;
            border-bottom: 1px solid rgb(3, 60, 117);
        }

        .container button {
            padding: 12px;
            width: 100px;
            border-radius: 5px;
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
            border: 0;
            background-color:  rgb(3, 60, 117);
            color: #fff;
            margin-top: 20px;
            margin-left: 40px;
            transition: all 1s ease;
        }
        .container button:hover{
            cursor: pointer;
            background-color:rgb(2, 46, 90);
        }
        .container form {
            margin-top: 35px;
        }
        .down {
            margin-top: 20px;
            text-align: left;
            

        }
        .down a {
            text-decoration: none;
            font-size: 15px;
            margin-left: 30px;
            font-family: 'Poppins', sans-serif;
            color: rgb(148, 146, 146);
        }
        #button {
            text-align: left;
        }
    </style>

</head>

<body style="background-color:rgb(3, 60, 117);">

    <div class="container" style=" background-color: #fff;">
        <h3>IP<span>TEL</span></h3>
        <div class="msg"></div>
        <p><i class="fa-solid fa-circle-user"></i> Entre na sua conta !</p>
        <?php if(isset($_SESSION['message'])) :?>
                <h5><?=$_SESSION['message']; ?></h5>
            <?php
                unset($_SESSION['message']);
                endif;
        ?>
        <form  method="POST">
            <div class="mb-3">
            <i class="fa-solid fa-envelope" ></i> <input type="email" name="email" class="email" placeholder="E-mail" >
            </div>
            <div class="mb-3">
                <i class="fa-solid fa-lock"></i> <input type="password" name="senha" class="senha" placeholder="Senha de acesso">
            </div>
            <div class="mb-3" id="button">
                <button type="submit" style="width: 300px;" class="btn-login" name="btn-login"><i style="color:#Fff;" class="fa-solid fa-right-to-bracket"></i> Entrar</button>
            </div>
        </form>
        <div class="down">
            <a href="senha-config"> Esqueci minha senha !</a> <br><br>
            <a href="/iptel.ao/">Voltar</a>
        </div>
    </div>

    <!--JAVASCRIPT-->
    <script src="js/App.js"></script>
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/36e038fa1a.js" crossorigin="anonymous"></script>
    
</body>

</html>