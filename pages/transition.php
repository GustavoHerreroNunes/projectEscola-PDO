<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Tabelas</title>
        <link rel="icon" href="../assets/img/logo/logo-Sem_Letras.png" />
        <link rel="stylesheet" type="text/css" href="../styles/reset.css" />
        <link rel="stylesheet" type="text/css" href="../styles/pageDefault.css" />
        <link rel="stylesheet" type="text/css" href="../styles/transition.css" />

    </head>

    <script language="javascript" src="../opSelect.js"></script>

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
                <a href ="javascript: transitionSubmit(0)">
                <div id="Option">
                <img id="Icone" src="../assets/img/icons/menu/cadastrar1.png"/><br>
                Cadastrar
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(1)">
                <div id="Option">
                <img id="Icone" src="../assets/img/icons/menu/excluir1.png"/><br>
                Excluir
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(2)">
                <div id="Option">
                <img id="Icone" src="../assets/img/icons/menu/pesquisar1.png"/><br>
                Pesquisar
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(3)">
                <div id="Option">
                <img id="Icone" src="../assets/img/icons/menu/alterar1.png"/><br>
                Alterar
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(4)">
                <div id="Option">
                <img id="Icone" src="../assets/img/icons/menu/listar1.png"/><br>
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
                $op = $_POST['opSelect'];//Recebendo opção de manutenção selecionada pelo usuário

                /*Se alguma das opções de manutenção foi selecionada*/
                if($op != 5){

                    /*Criando array bidmensional para determinar qual página será aberta em seguida:
                        Ação de Manutenção -> linha(0 - 4)
                        Tabela de "db_escola" -> coluna(0 - 2)*/
                    $pages = array(
                        0 => array("cadastrar/cadasAluno.php", "cadastrar/cadasCurso.php", "cadastrar/cadasDisc.php"),
                        1 => array("excluir/excluirAluno.php", "excluir/excluirCurso.php", "excluir/excluirDisc.php"),
                        2 => array("pesquisar/pesqAluno.php", "pesquisar/pesqCurso.php", "pesquisar/pesqDisc.php"),
                        3 => array("alterar/alterarAluno.php", "alterar/alterarCurso.php", "alterar/alterarDisc.php"),
                        4 => array("listar/listarAluno.php", "listar/listarCurso.php", "listar/listarDisc.php"),
                    );
            ?>
                <h1>Selecione uma Tabela</h1>
                
                <div id="orgHori">
                <a href=<?php echo $pages[$op][0]; ?>>
                <div id="Tabelas">
                    <img src="../assets/img/icons/tables/aluno1.png" />
                    <hr>
                    <br>
                    <h2>Aluno</h2>
                </div>
                </a>
                <a href=<?php echo $pages[$op][1]; ?>>
                <div id="Tabelas">
                    <img src="../assets/img/icons/tables/curso1.png" />
                    <hr>
                    <br>
                    <h2>Curso</h2>
                </div>
                </a>
                <a href=<?php echo $pages[$op][2]; ?>>
                <div id="Tabelas">
                    <img src="../assets/img/icons/tables/disc1.png" />
                    <hr>
                    <br>
                    <h2>Disciplina</h2>
                </div>
                </a>
                </div>
            <?php
                }else{
            ?>
                <h1>Error 404</h1>
                <br>
                Página não encontrada
            <?php
                }
            ?>

            </center>
        </div>
        
        <form name="operation" method="POST" action="transition.php">
            <input type="hidden" name="opSelect" value="5">
        </form>
    </body>

</html>