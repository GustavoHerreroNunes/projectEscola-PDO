<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>UJB - Cadastrar Aluno</title>
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

            <h1>Cadastro de Aluno</h1>
            <br>
            <form name="cliente" method="POST" action="">
                <fieldset>

                    <legend><b>Dados do Aluno:</b></legend>
                    <br>
                        <p>
                            Nome:
                            <input type="text" name="txbNome" size="30" maxlength="50" placeholder="Nome do Aluno" id="textBox">
                        </p>
                        <br>
                        <p>
                            Endereço:
                            <input type="text" name="txbEnder" size="30" placeholder="Rua Exemplo nº000" id="textBox">
                        </p>
                        <br>
                        <p>
                            Cidade:
                            <input type="text" name="txbCidade" size="20" placeholder="Cidade do Aluno" id="textBox">
                        </p>
                        <br>
                        <p>
                            Curso:
                            <input type="text" name="txbCurso" size="20" placeholder="Código do Curso" id="textBox">
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

                    include_once './../../conectionDB/aluno.php';
                    $aln = new Aluno();
                    $aln->setNome($txbNome);
                    $aln->setEndereco($txbEnder);
                    $aln->setCidade($txbCidade);
                    $aln->setCodCurso($txbCurso);

                    echo "<h4><br><br>".$aln->salvar()."</h4>";

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