<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Bancos de Dados</title>
        <link rel="icon" href="../assets/img/logo/logo-Sem_Letras.png" />
        <link rel="stylesheet" type="text/css" href="../styles/reset.css" />
        <link rel="stylesheet" type="text/css" href="../styles/pageDefault.css" />

    </head>
    <body>
        <nav id="Menu">
            
            <li>
                <a href ="menu.html">
                <div id="Option">
                <img id="Logo" src="../assets/img/logo/logo-Sem_Letras.png"/>
                </div>
                </a>
            </li>
            <li>
                <a href ="">
                <div id="Option">
                <img id="Icone" src="../assets/img/menu_icons/cadastrar1.png"/><br>
                Cadastrar
                </div>
                </a>
            </li>
            <li>
                <a href ="">
                <div id="Option">
                <img id="Icone" src="../assets/img/menu_icons/excluir1.png"/><br>
                Excluir
                </div>
                </a>
            </li>
            <li>
                <a href ="">
                <div id="Option">
                <img id="Icone" src="../assets/img/menu_icons/pesquisar1.png"/><br>
                Pesquisar
                </div>
                </a>
            </li>
            <li>
                <a href ="">
                <div id="Option">
                <img id="Icone" src="../assets/img/menu_icons/alterar1.png"/><br>
                Alterar
                </div>
                </a>
            </li>
            <li>
                <a href ="">
                <div id="Option">
                <img id="Icone" src="../assets/img/menu_icons/listar1.png"/><br>
                Listar
                </div>
                </a>
            </li>
            
        </nav>

        <div id="Conteudo">
            <center>
            <?php
                Error_reporting(0);//Desativando mensagens de erro padrão do PHP
                
                $op = 0;
                $op = $_POST['opSelect'];

                $txt = "menu.html";

                if($op != 5){
                    $pages = array(
                        0 => array("cadasAluno.php", "cadasCurso.php", "cadasDisc.php"),
                        1 => array("excluirAluno.php", "excluirCurso.php", "excluirDisc.php"),
                        2 => array("pesqAluno.php", "pesqCurso.php", "pesqDisc.php"),
                        3 => array("alterarAluno.php", "alterarCurso.php", "alterarDisc.php"),
                        4 => array("listarAluno.php", "listarCurso.php", "menu.html"),
                    );
            ?>
                <h1>Selecione um Banco de Dados</h1>

                <a href=<?php echo $pages[$op][0]; ?>><button id="button">Aluno</button></a>
            <?php
                }else{
            ?>
                <h1>Error 404</h1>
            <?php
                }
            ?>

            </center>
        </div>
    </body>

</html>