

<?php
    session_start();
    //REQUERENDO A CONEXÃO COM O BANCO DE DADOS !!!!
    include('config/conexao.php');
    
    //SE EXISTIR UM POST DO BOTÃO COM NOME INSCERVER-SE DA PARTE DO HTML (FRONTEND)!!!!
    if(isset($_POST['inscrever-se']))
    
    {
        //CRIA AS SEGUINTES VARIAVEIS....................................................
        //RECEBENDO O NOME DO POST !!!!
        $nome = $_POST['nome'];

        //RECEBENDO O SEXO ESCOLHIDO DO POST  !!!!
        $sexo = $_POST['sexo'];

        //RECEBENDO O VALOR DO EMAIL DO POST !!!!
        $email = $_POST['email'];

        //RECEBENDO O VALOR DA IDADE DO POST !!!!
        $idade = $_POST['idade'];

        //RECEBENDO O O CURSO ESCOLHIDO !!!!
        $curso = $_POST['curso'];

        //RECEBENDO O NOME DO ENCARREGADO DO CANDIDATO !!!!
        $encarregado = $_POST['encarregado'];

        //RECEBENDO OS UPLOAD DO POST [BI, FOTO, CERTIFICADO] ....................
        // UPLOAD DO BILHETE DE IDENTIDADE !!!
        $upload_bi = $_FILES['upload_bi'];

        //UPLOAD DA FOTOGRAFIA TIPO PASSE !!!
        $upload_foto = $_FILES['upload_foto'];

        //UPLOAD DO CERTIFICADO DA CLASSE ENTERIOR!!!! 
        $upload_certificado = $_FILES['upload_certificado'];

        $data_inscricao = date('d/m/Y');

        

        /* VERIFICAÇÃO E VALIDAÇÃO DE CAMOS VAZIOS E NÃO PERMITIDOS */
        if(empty($nome) || empty($sexo) || empty($email) || empty($idade) || empty($curso) || empty($encarregado) || empty($upload_bi)){

            
            // SE ESTÁ VAZIO EXIBIR UM ERRO NA TAG H5 
            $_SESSION['message'] = "<h5 class='alert alert-danger'>PORFAVOR ! É Necessario Que Preencha Todos Os Campos.</h5>";
        }

        // VERIFICARNOME É SOMENTE LETRAS E ESPAÇOS EM BRANCO
        /* else if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
            $_SESSION['message'] = "<h5 class='alert alert-danger'>ATENÇÃO! Somente Permitidos Letras e Espaços em Brancos !.</h5>";
        } */

        // VERIFICAR SE O EMAIL É VÁLIDO
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "<h5 class='alert alert-danger'>ATENÇÃO! Endereço de E-mail Inválido !.</h5>";
        }

        //
        else{

            

                // SE NÃO EXISTIR ERROS NOS CAMPOS DE ENTRADA !!!!!!!!!!!!!

                // INSERIR OS ARQUIVOS DE UPLOAD NO BANCO DE DADOS E ADCIONAR-LAS A PASTA DOS ARQUIVOS DE UPLOAD
                // BILHETE DE IDENTIDIDADE 
                $upload_bi = $_FILES['upload_bi']['name'];

                // FOTOGRAFIA TIPO PASSE
                $upload_foto = $_FILES['upload_foto']['name'];

                //CERTIFICADO CLASSE ANTERIOR 
                $upload_certificado = $_FILES['upload_certificado']['name'];

                // PEGANDO A ESTENSÃO DO ARQUIVOS DOS UPLOADS !!!!!
                $extensao = strtolower(pathinfo($upload_bi,PATHINFO_EXTENSION));
                $extensao  = strtolower(pathinfo($upload_foto,PATHINFO_EXTENSION));
                $extensao  = strtolower(pathinfo($upload_certificado,PATHINFO_EXTENSION));
                
                //DEFINIR UM NOME NOME E CONCATENAR COM A ESTENSÃO !!!!
                $novo_nome_bi = md5(time()).".".$extensao;
                $novo_nome_foto = md5(time()).".".$extensao;
                $novo_nome_certificado = md5(time()).".".$extensao;
                
                //MOVENDO OS ARQUIVOS UPLOAD PARA A PASTA DENOMINADA UPLOAD!!!

                //UPLOAD BI NA SUA RESPECTIVA PASTA
                $diretorio_bi = "upload/bi/";

                //UPLOAD FOTO NA SUA RESPECTIVA PASTA
                $diretorio_foto = "upload/foto/";

                //UPLOAD CERTIFICADO NA SUA RESPECTIVA PASTA
                $diretorio_certificado = "upload/certificado/";
                
                // COMANDO PARA MOVER OS MESMOS ARQUIVOS DE UPLOAD !!!!!!!!!!!!!!
                move_uploaded_file($_FILES['upload_bi']['tmp_name'],$diretorio_bi .$novo_nome_bi);
                move_uploaded_file($_FILES['upload_foto']['tmp_name'], $diretorio_foto . $novo_nome_foto);
                move_uploaded_file($_FILES['upload_certificado']['tmp_name'], $diretorio_certificado . $novo_nome_certificado); 

                //INSERÇÃO DOS ARQUIVOS AO BANCO DE DADOS !!!!!!!!!!!!
            //  $query = "INSERT INTO arquivo (novo_nome) VALUES('$novo_nome_bi', '$novo_nome_foto', '$novo_nome_certificado', NOW())";

                //INSERÇÃO DOS DADOS DO CANDIDATO NO BANCO DE DADOS !!!!!!
                $query = "INSERT INTO prealunos (nome, encarregado, email, idade, sexo, curso) VALUES (:nome, :encarregado, :email, :idade, :sexo, :curso)";
                $query_run = $conn->prepare($query);
                $data = [
                    ":nome" =>$nome,
                    ":encarregado" =>$encarregado,
                    ":email" =>$email,
                    ":idade" =>$curso,
                    ":sexo" =>$sexo,
                    ":curso" =>$curso,
                    
                ];
                $query_execute = $query_run->execute($data);
                //SE A INSERÇÃO FOR OK ////
                if($query_execute)
                {   // MESNAGEM DE SUCESSO NA TAG H5
                    
                    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js' integrity='sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/'
                            crossorigin='anonymous'>
                        </script>
                    ";
                    echo "
                   
                        
                            <script>
                            // Instanciar o jsPDF
                            var doc = new jsPDF();
            
                            // Texto que deve estar no PDF
                            
                            doc.text('....................................................................................................................................', 1, 50);
                            doc.text('** INSTITUTO POLITÉCNICO DE TECNOLOGIA E INOVAÇÃO (IPTEL) ** !', 10, 80);
                            doc.text('Ficha de Pré Inscrição de Aluno IPTEL', 52, 100);
                            doc.text('1. Nome.......................... $nome', 50, 110);
                            doc.text('2. Idade......................... $idade', 50, 120);
                            doc.text('3. Curso......................... $curso', 50, 130);
                            doc.text('4. E-mail.........................$email', 50, 140);
                            doc.text('Entregar a Ficha na Direcção do Instituto', 50, 150);
                            doc.text('....................................................................................................................................', 1, 180);
                            doc.text('Data de Inscrição....................$data_inscricao', 52, 230);
                    
                            // Gerar PDF
                            doc.save('Ficha de Pré Inscrição.pdf');</script>
                        
                    ";

                    
                    $count1 = 000000000;
                    $count2 = 123456789;
                    $gerado = rand($count1, $count2);

                    

                    $_SESSION['message'] = "<h5 class='alert alert-success'>OBRIGADO! Recebemos a Sua Pré Inscrição Use $gerado Como Senha de Acesso <br> Para Ver O Estado Da Inscrição!.</h5>";
                    
                }
                else
                {   // SE NÃO JAVASCRIPT COM COMANDO ALERTA PARA ERRO INTERNO !!!!
                    echo "<script>alert('ERRO DE SISTEMA !')</script>";
                }
                }
        }  

?>



<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Titulo-->
    <title>IPTEL - Inscrição de Pré Aluno</title>

    <!--Folha De Estilo CSS-->
    <link rel="stylesheet" href="css/_formulario.css">

    <!--AOS ANIMATE CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/_bootstrap.min.css">


    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    
    <style>
        #staticBackdrop button{
            width: 80px;
        }
        .alert-success {
            font-size: 14px;
            text-align: center;
            font-weight: 600;
            font-family: 'Barlow', sans-serif;
        }
        .alert-danger{
            font-size: 14px;
            text-align: center;
            font-weight: 600;
            font-family: 'Barlow', sans-serif;
        }
        #navbar{
            position: fixed;
            top: 0;
            z-index: 1000;
            
        }
        .container-form {
            height: 110vh;
        }
    </style>


</head>

<body>

    <!--Jquery-->
    <script src="js/JQuery.js"></script>
    <!--AOS ANIMATE CSS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     


    <!--Header-->
        <header>
            <nav id="navbar">
                <div class="logo">
                    <h3><i class="fa-solid fa-book"></i>IP<span>TEL</span></h3>
                </div>
                <ul>
                    <li><a href="index"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="index#sobre"><i class="fa-sharp fa-solid fa-circle-info"></i> Sobre</a></li>
                    <li><a href="index#cursos"><i class="fa-solid fa-award"></i> Cursos</a></li>
                    <li><a href="inscricao"><i class="fa-solid fa-chalkboard-user"></i> Inscrições</a></li>
                    <li><a href="email:gabrielcorto272@gmail.com"><i class="fa-solid fa-envelope"></i> E-mail</a></li>
                    <li><a href="tel:+244923008156"><i class="fa-solid fa-phone"></i> Contactos</a></li>
                    
            
                </ul>
                <div class="midia">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-telegram"></i>
                </div>
                <div class="admin">
                    <a class="btn-admin-login" href="aluno/entrar"><i class="fa-solid fa-right-to-bracket"></i> Entrar</a>
                </div>
            </nav>
        </header>
    <!--Fim....-->
    <div class="container-form">
        <form method="post" enctype="multipart/form-data">
            <h1>IP<span>TEL</span> </h1>
            <h4>Pré Inscrição De Alunos !</h4>
            <?php if(isset($_SESSION['message'])) :?>
                <h5><?=$_SESSION['message']; ?></h5>
            <?php
                unset($_SESSION['message']);
                endif;
            
            ?>
            <div class="mb-3">
                <input type="text" class="input-nome" name="nome" placeholder="Nome Completo" required>
                <input type="text" class="input-encarregado" name="encarregado" placeholder="Encarregado Educação" required>
            </div>

            <div class="mb-3">
                <input type="text" class="input-email"  name="email" placeholder="E-mail" required>
                <input type="text" class="input-idade"  name="idade" placeholder="Idade" required>
            </div>

            <div class="mb-3">
                <select name="sexo" class="select-sexo" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>

            <div class="mb-3">
                <select name="curso" class="select-curso" required>
                    <option value="Não-Identificado">Escolha O Seu Curso</option>
                    <option value="Eletronica-Telecomunicacoes">Eletrónica e Telecomunicação</option>
                    <option value="Técnico-Informática">Técnico de Informática</option>
                    <option value="Técnico-Obras">Técnico de Obras</option>
                    <option value="Instalações-Eletrícas">Instalações Eletrícas</option>
                    <option value="BioQuímica">BioQuímica</option>
                    <option value="Gestão-Redes">Gestão de Redes</option>
                </select>
            </div>
            <div class="mb-3">
                <p>Anexe o Seu BI <i class="fa-solid fa-paperclip"></i></p>
                <input type="file"   name="upload_bi" class="upload-input" required>
            </div>
            <div class="mb-3">
                <p>Anexe a Sua Fotografia tipo Passe <i class="fa-solid fa-paperclip"></i></p>
                <input type="file"  name="upload_foto" class="upload-input" required>
            </div>
            <div class="mb-3">
                <p>Anexe o Seu C. Habilitação <i class="fa-solid fa-paperclip"></i></p>
                <input type="file" name="upload_certificado" class="upload-input" required>
            </div>
            <div class="mb-3">
                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="inscrever-se" onclick="gerar()" type="submit" class="btn-inscrever"><i style="color:#fff;" class="fa-brands fa-telegram"></i> Inscrever-se</button>
            </div>
        </form>
    </div>
    

    
    
   

    <script>
        AOS.init();
     </script>



    <!---JAVASACRIPT-->
    <script src="js/_bootstrap.bundle.js"></script>

    <!--JQUERY-->
    <script src="js/JQuery.js"></script>
    
    <!--FONTAWESOME KIT-->
    <script src="https://kit.fontawesome.com/36e038fa1a.js" crossorigin="anonymous"></script>

    
    
</body>

</html>