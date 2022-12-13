<?php

    if(isset($_GET['enviar-newslatter'])){

        $email = $_GET['email-newslatter'];
        if(empty($email)){

            echo "<script>alert('PORFAVOR! Preencha O Campo E-mail !')</script>";
        }else{
            echo "<script>alert('OBRIGADO! Por Se Inscrever na Nossa newslatter')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Titulo-->
    <title>IPTEL - Instituto Tecnologico e Inovação</title>

    <!--Folha De Estilo CSS-->
    <link rel="stylesheet" href="css/_main-style.css">

    <!--AOS ANIMATE CSS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">


    <style>
        #navbar {
            background-color: rgb(3, 60, 117); 
            z-index: 1000;
            position: fixed;
            top: 0;

        }
    </style>

</head>

<body>

    <!--Jquery-->
    <script src="js/JQuery.js"></script>
    <!--AOS ANIMATE CSS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        $(document).ready(function (){
            $('.curso-btn').click(function (){
                location.href = "inscricao"
            })
            $('.btn-admin-login').click(function (){
                confirm('ATENÇÃO! Somente Os Alunos Da Instituição Poderam Fazer O Login!');
            })
        })
    </script>

  

    <!--Header-->
        <header>
            <nav id="navbar">
                <div class="logo">
                    <h3><i class="fa-solid fa-book"></i>IP<span>TEL</span></h3>
                </div>
                <ul>
                    <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="#sobre"><i class="fa-sharp fa-solid fa-circle-info"></i> Sobre</a></li>
                    <li><a href="#cursos"><i class="fa-solid fa-award"></i> Cursos</a></li>
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

    
    
    <div class="main-document">
        <!---Texto BG-->
        <div class="container-text-bg">
            <h5>O MELHOR DA EDUCAÇÃO</h5>
            <h2>Instituto  Tecnologico e Inovação, <br> 
            Seja Muito Bem Vindo ao Nosso Portal !</h2>
            
            <div class="my-buttons">
                <a class="btn-2 inscrever-se" href="inscricao"><i class="fa-solid fa-id-card"></i> Inscrições</a>
            </div>
        </div>
        <!--Fim......-->


        
        <section id="sobre" class="about-container"  data-aos="fade-down">
            <h3 style="text-align:center;">Sobre <span>IPTEL</span> </h3>
            <div class="justifyle-center-about">
                <div class="descricao">
                    
                    <h2>Bem Vindo ao Poratl IPTEL</h2>
                    <div class="listas">
                        <div class="primeira">
                            <p><i class="fa-sharp fa-solid fa-circle-info"></i> Qualidade</p>
                            <p><i class="fa-sharp fa-solid fa-circle-info"></i> Ensino de Classe</p>
                            <p><i class="fa-sharp fa-solid fa-circle-info"></i> Professores de Qualidade</p>
                            
                        </div>
                        <div class="segunda">
                            <p><i class="fa-sharp fa-solid fa-circle-info"></i> Competência</p>
                            <p><i class="fa-sharp fa-solid fa-circle-info"></i> Tecnologia de Alta</p>
                            <p><i class="fa-sharp fa-solid fa-circle-info"></i> Laboratórios Sufisticados</p>
                        </div>
                    </div>
                </div>
                <figure class="imagen">
                    <img src="img/about.png" alt="">
                </figure>
            </div>
            <a href="inscricao" class="about-btn"><i class="fa-solid fa-id-card"></i> Inscrever-se</a>
        </section>

        <section id="cursos" data-aos="fade-down-right">
            <h3 style="text-align:center;">Cursos <span>IPTEL</span></h3>
            <div class="container-cursos">
                <div class="primeira-tabela" data-aos="zoom-in-down">
                    <figure>
                        <img src="img/course-1.jpg" alt="">
                    </figure>
                    <article class="curso-info">
                        <h5>19.000 Kz</h5>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        <main class="curso-nome">Telecomunicação</main>
                        <button class="curso-btn"><i class="fa-solid fa-right-to-bracket"></i> Inscrever-se</button>
                    </article>
                    <footer>
                        
                    </footer>
                </div>
                <div class="segunda-tabela" data-aos="zoom-in-down">
                    <figure>
                        <img src="img/course-2.jpg" alt="">
                    </figure>
                    <article class="curso-info">
                        <h5>16.000 Kz</h5>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        <main class="curso-nome">Técnico de Informática</main>
                        <button class="curso-btn"><i class="fa-solid fa-right-to-bracket"></i> Inscrever-se</button>
                    </article>
                </div>
                <div class="terceira-tabela" data-aos="zoom-in-down">
                    <figure>
                        <img src="img/course-3.jpg" alt="">
                    </figure>
                    <article class="curso-info">
                        <h5>14.000 Kz</h5>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        <main class="curso-nome">Gestão de Redes</main>
                        <button class="curso-btn"><i class="fa-solid fa-right-to-bracket"></i> Inscrever-se</button>
                    </article>
                </div>
            </div>
        </section>
        <section id="cursos" data-aos="fade-down-right">
            <div class="container-cursos">
                <div class="primeira-tabela" data-aos="zoom-in-down">
                    <figure>
                        <img src="img/course-4.jpg" alt="">
                    </figure>
                    <article class="curso-info">
                        <h5>13.700 Kz</h5>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        <main class="curso-nome">Técnico De Obras</main>
                        <button class="curso-btn"><i class="fa-solid fa-right-to-bracket"></i> Inscrever-se</button>
                    </article>
                    <footer>
                        
                    </footer>
                </div>
                <div class="segunda-tabela" data-aos="zoom-in-down">
                    <figure>
                        <img src="img/course-6.png" alt="">
                    </figure>
                    <article class="curso-info">
                        <h5>14.700 Kz</h5>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        <main class="curso-nome">Instalações Eletrícas</main>
                        <button class="curso-btn"><i class="fa-solid fa-right-to-bracket"></i> Inscrever-se</button>
                    </article>
                </div>
                <div class="terceira-tabela" data-aos="zoom-in-down">
                    <figure>
                        <img src="img/course-5.jpg" alt="">
                    </figure>
                    <article class="curso-info">
                        <h5>14.900 Kz</h5>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        <main class="curso-nome">BioQuímica</main>
                        <button class="curso-btn"><i class="fa-solid fa-right-to-bracket"></i> Inscrever-se</button>
                    </article>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="footer-logo">
                <h3>IP<span>TEL</span></h3>
                <form method="GET" class="newslatter">
                    <p>NewsLatter</p>
                    <input type="email" name="email-newslatter" placeholder="E-mail...">
                    <button name="enviar-newslatter" class="enviar-newslatter"><i style="color:#fff;" class="fa-brands fa-telegram"> </i> Enviar</button>
                </form>
                <p>&copy; Todos Os Direitos Reservados</p>
            </div>
            <div class="contactos">
                <h5>Endereços</h5>
                <p><i class="fa-solid fa-phone"></i> +244 999 000 888</p>
                <p><i class="fa-solid fa-envelope"></i> geral@iptel.ao</p>
                <p><i class="fa-solid fa-location-dot"></i> Angola - Luanda</p>
            </div>
            <div class="social-midia">
                <h5>Siga-nos</h5>
                <p><i class="fa-brands fa-facebook"></i></p>
                <p><i class="fa-brands fa-instagram"></i></p>
                <p><i class="fa-brands fa-twitter"></i></p>
            </div>
        </footer>
    </div>


    

    <script>
        AOS.init();
     </script>
     <script>
        $(document).ready(function (){
            $('.curso-btn').click(function (){
                location.href = "inscricao"
            })
            $('.btn-admin-login').click(function (){
                confirm('ATENÇÃO! Somente Os Alunos Da Instituição Poderam Fazer O Login!');
            })
        })
    </script>
    <script>
        
        let btn = document.querySelector('button.curso-btn')
        btn.click = function(){
            location.href = "inscricao"
        }

    </script>

    <!---JAVASACRIPT-->
    <script src="js/_bootstrap.bundle.js"></script>
    <script src="js/_App.js"></script>

    <!--JQUERY-->
    <script src="js/JQuery.js"></script>
    
    <!--FONTAWESOME KIT-->
    <script src="https://kit.fontawesome.com/36e038fa1a.js" crossorigin="anonymous"></script>

    
    
</body>

</html>