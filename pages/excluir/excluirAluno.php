<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Excluir Aluno</title>
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

            <h1>Exclusão de Aluno</h1>
            <br>
            <form name="cliente" method="POST" action="">
                <fieldset>
                
                    <legend><b>Informe a Matrícula do Aluno</b></legend>
                    <br>
                        <p>
                            Matrícula:
                            <input type="text" name="txbMatric" size="30" maxlength="5" placeholder="Digite apenas números" id="textBox">
                        </p>

                </fieldset>
                <br>
                <fieldset>
                
                    <legend><b>Opções</b></legend>
                    <br>
                    <input type="submit" name="btnExcluir" value="Excluir" id="button">&nbsp;&nbsp;
                    <input type="reset" name="btnLimpar" value="Limpar" onClick="document.cliente.txbMatric.focus()" id="button">
                
                </fieldset>
            </form>

            <br>

            <legend><b>Resultado</b></legend>

            <?php

                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnExcluir)){

                    include_once './../../conectionDB/aluno.php';
                    $aln = new Aluno();
                    $aln->setMatricula($txbMatric);

                    echo "<h4><br><br>".$aln->exclusao()."</h4>";

                }

            ?>
            <br>
            <br>
            <center>
            <a href="menu.html"><button id="button">Voltar</button></a>
            </center>
            </center>
        </div>

        <form name="operation" method="POST" action="../transition.php">
            <input type="hidden" name="opSelect" value="5">
        </form>
    </body>
</html>