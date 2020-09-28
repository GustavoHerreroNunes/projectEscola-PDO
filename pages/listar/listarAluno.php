<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Listar Aluno</title>
        <link rel="icon" href="../../assets/img/logo/logo-Sem_Letras.png" />
        <link rel="stylesheet" type="text/css" href="../../styles/reset.css" />
        <link rel="stylesheet" type="text/css" href="../../styles/pageDefault.css" />

    </head>

    <script language="javascript" src="../../opSelect.js"></script>

    <body>
        <nav id="Menu">
            
            <li>
                <a href ="../menu.html">
                <div id="Option">
                <img id="Logo" src="../../assets/img/logo/logo-Sem_Letras.png"/>
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(0)">
                <div id="Option">
                <img id="Icone" src="../../assets/img/icons/menu/cadastrar1.png"/><br>
                Cadastrar
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(1)">
                <div id="Option">
                <img id="Icone" src="../../assets/img/icons/menu/excluir1.png"/><br>
                Excluir
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(2)">
                <div id="Option">
                <img id="Icone" src="../../assets/img/icons/menu/pesquisar1.png"/><br>
                Pesquisar
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(3)">
                <div id="Option">
                <img id="Icone" src="../../assets/img/icons/menu/alterar1.png"/><br>
                Alterar
                </div>
                </a>
            </li>
            <li>
                <a href ="javascript: transitionSubmit(4)">
                <div id="Option">
                <img id="Icone" src="../../assets/img/icons/menu/listar1.png"/><br>
                Listar
                </div>
                </a>
            </li>
            
        </nav>

        <div id="Conteudo">
            <center>

            <h1>Relação de Alunos Matriculados</h1>

            <br>
            <?php

                include_once './../../conectionDB/aluno.php';
                $aln = new Aluno();
                $pro_bd = $aln->listar();

            ?>

            <b><font color="#B41D1D"> Matrícula &nbsp;&nbsp;&nbsp;&nbsp; Nome &nbsp;&nbsp;&nbsp;&nbsp; Endereço &nbsp;&nbsp;&nbsp;&nbsp; Cidade &nbsp;&nbsp;&nbsp;&nbsp; Curso </font></b>

            <?php
                foreach($pro_bd as $pro_mostrar){
            ?>
                    <br><br>
                    <b><font color="#B41D1D"><?php echo $pro_mostrar[0]; ?></font></b>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $pro_mostrar[1]; ?>    &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $pro_mostrar[2]; ?>    &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $pro_mostrar[3]; ?>    &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $pro_mostrar[4]; 
                }?> 
            <br>
            <center>
                <a href="../menu.html"><button id="button">Voltar</button></a>
            </center>
            </center>
        </div>

        <form name="operation" method="POST" action="../transition.php">
            <input type="hidden" name="opSelect" value="5">
        </form>
    </body>
</html>