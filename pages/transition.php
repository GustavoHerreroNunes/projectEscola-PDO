<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Bancos de Dados</title>
        <link rel="icon" href="../assets/img/logo/logo-Sem_Letras.png" />
        <link rel="stylesheet" type="text/css" href="../styles/reset.css" />
        <link rel="stylesheet" type="text/css" href="../styles/pageDefault.css" />
        <link rel="stylesheet" type="text/css" href="../styles/transition.css" />

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
                        0 => array("cadasAluno.php", "cadasCurso.php", "cadasDisc.php"),
                        1 => array("excluirAluno.php", "excluirCurso.php", "excluirDisc.php"),
                        2 => array("pesqAluno.php", "pesqCurso.php", "pesqDisc.php"),
                        3 => array("alterarAluno.php", "alterarCurso.php", "alterarDisc.php"),
                        4 => array("listarAluno.php", "listarCurso.php", "menu.html"),
                    );
            ?>
                <h1>Selecione um Banco de Dados</h1>
                
                <div id="orgHori">
                <a href=<?php echo $pages[$op][0]; ?>>
                <div id="Tabelas">
                    <h2>Aluno</h2>

                    Registros de todos os Alunos matriculados na Universidade
                    <br>
                    matricula<b>(PK)</b>	- varchar(5)&nbsp;&nbsp;&nbsp;&nbsp;nome - varchar(50)<br>
                    endereco - varchar(50)&nbsp;&nbsp;&nbsp;&nbsp;cidade - varchar(30)<br>
                    codcurso - char(2)
                    </h5>
                </div>
                </a>
                <a href=<?php echo $pages[$op][1]; ?>>
                <div id="Tabelas">
                    <h2>Curso</h2>

                    Registros de todos os Cursos disponíveis na Universidade
                    <br>
                    codcurso<b>(PK)</b>	- char(2)&nbsp;&nbsp;&nbsp;&nbsp;nome - varchar(50)<br>
                    coddisc1 - char(2)&nbsp;&nbsp;&nbsp;&nbsp;coddisc2 - char(2)<br>
                    coddisc3 - char(2)
                    </h5>
                </div>
                </a>
                <a href=<?php echo $pages[$op][2]; ?>>
                <div id="Tabelas">
                    <h2>Disciplina</h2>

                    Registros de todas as Disciplinas de cursos da Universidade
                    <br>
                    codcurso<b>(PK)</b>	- char(2)&nbsp;&nbsp;&nbsp;&nbsp;nome - varchar(50)<br>
                    coddisc1 - char(2)&nbsp;&nbsp;&nbsp;&nbsp;coddisc2 - char(2)<br>
                    coddisc3 - char(2)
                    </h5>
                </div>
                </a>
                </div>
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