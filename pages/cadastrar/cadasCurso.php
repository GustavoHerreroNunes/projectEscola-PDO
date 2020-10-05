<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Cadastrar Curso</title>
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

            <h1>Cadastro de Curso</h1>
            <br>
            <form name="cliente" method="POST" action="">
                <fieldset>

                    <legend><b>Dados do Curso:</b></legend>
                    <br>
                        <p>
                            Código:
                            <input type="text" name="txbCod" size="20" placeholder="Código do Curso" id="textBox">
                        </p>
                        <br>
                        <p>
                            Nome:
                            <input type="text" name="txbNome" size="30" maxlength="50" placeholder="Nome do Curso" id="textBox">
                        </p>
                        <br>
                        <p>
                            Disciplina I:
                            <input type="text" name="txbDisc1" size="20" placeholder="Código da 1º Disciplina" id="textBox">
                        </p>
                        <br>
                        <p>
                            Disciplina II:
                            <input type="text" name="txbDisc2" size="20" placeholder="Código da 2º Disciplina" id="textBox">
                        </p>
                        <br>
                        <p>
                            Disciplina III:
                            <input type="text" name="txbDisc3" size="20" placeholder="Código da 3º Disciplina" id="textBox">
                        </p>

                </fieldset>
                <br>
                <fieldset>

                    <legend><b>Opções</b></legend>
                    <br>
                    <input type="submit" name="btnCadas" value="Cadastrar" id="button"> &nbsp;&nbsp;
                    <input type="reset" name="btnReset" value="Limpar" onClick="document.cliente.txbNome.focus()" id="button">
                
                </fieldset>
            </form>

            <?php

                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnCadas)){

                    include_once './../../conectionDB/curso.php';
                    $crs = new Curso();
                    $crs->setCodCurso($txbCod);
                    $crs->setNome($txbNome);
                    $crs->setCodDisc1($txbDisc1);
                    $crs->setCodDisc2($txbDisc2);
                    $crs->setCodDisc3($txbDisc3);

                    echo "<h4><br><br>".$crs->salvar()."</h4>";

                }

            ?>
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