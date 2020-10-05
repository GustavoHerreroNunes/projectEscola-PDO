<?php
    include_once 'conectar.php';

    class Curso{

        /*Atributos*/

        private $codCurso;
        private $nome;
        private $codDisc1;
        private $codDisc2;
        private $codDisc3;
        private $conn;//Futura instância de Conectar

        /*Getters e Setters*/

        public function getCodCurso(){
            return $this->codCurso;
        }
        public function setCodCurso($codCursoF){
            $this->codCurso = $codCursoF;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nomeF){
            $this->nome = $nomeF;
        }

        public function getCodDisc1(){
            return $this->codDisc1;
        }
        public function setCodDisc1($codDisc1F){
            $this->codDisc1 = $codDisc1F;
        }

        public function getCodDisc2(){
            return $this->codDisc2;
        }
        public function setCodDisc2($codDisc2F){
            $this->codDisc2 = $codDisc2F;
        }

        public function getCodDisc3(){
            return $this->codDisc3;
        }
        public function setCodDisc3($codDisc3F){
            $this->codDisc3 = $codDisc3F;
        }

        /*Métodos para realizar as ações de manutenção do banco de dados*/

        /*Função para salvar um novo registro*/
        function salvar(){
            try{
                
                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("insert into cursos values (?,?,?,?,?)");//Inserindo por código sql um novo registro, com 5 parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getCodCurso(), PDO::PARAM_STR);//Defindo primeiro parâmetro ($codCuso)
                @$sql->bindParam(2, $this->getNome(), PDO::PARAM_STR);//Defindo segundo parâmetro ($nome)
                @$sql->bindParam(3, $this->getCodDisc1(), PDO::PARAM_STR);//Definindo terceiro parâmetro ($codDisc1)
                @$sql->bindParam(4, $this->getCodDisc2(), PDO::PARAM_STR);//Definindo quarto parâmetro ($codDisc2)
                @$sql->bindParam(5, $this->getCodDisc3(), PDO::PARAM_STR);//Definindo quinto parâmetro ($codDisc3)

                
                if($sql->execute() == 1){//Se a execução do comando sql ocorrer sem erros
                    return "Registro salvo com sucesso!";
                }

                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL
                
                echo "Erro ao salvar o registro:".$exc->getMessage();
                
            }
        }

        /*Funções para alterar um registro*/
        /*Função para pesquisar e mostrar os campos de um registro*/
        function alterar(){
            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("select * from cursos where codcurso = ?");//Selecionando todos os campos de "cursos" com o codcurso passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getCodCurso(), PDO::PARAM_STR);//Definindo o parâmetro
                $sql->execute();
                return $sql->fechAll();//Carrega uma matriz com os campos selecionados da tabela do banco de dados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL
                
                echo "Erro ao alterar ".$exc->getMessage();

            }
        }

        /*Função para salvar as atualizações feitas nos campos*/
        function alterar2(){
            
            try{
            
                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("update cursos set nome = ?, coddisc1 = ?, coddisc2 = ?, coddisc3 = ? where codcurso = ?");//Atualizando os campos do registro passando parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//Definindo primeiro parâmetro
                @$sql->bindParam(2, $this->getCodDisc1(), PDO::PARAM_STR);//Definindo segundo parâmetro
                @$sql->bindParam(3, $this->getCodDisc2(), PDO::_PARAM_STR);//Definindo terceiro parâmetro
                @$sql->bindParam(4, $this->getCodDisc3(), PDO::_PARAM_STR);//Definindo quarto parâmetro
                @$sql->bindParam(5, $this->getCodCurso(), PDO::_PARAM_STR);//Definindo quinto parâmetro

                if($sql->execute() == 1){//Se a execução do código sql ocorrer sem erros
                    
                    return "Registro alterado com sucesso!";
                    
                }

                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao salvar o registro ".$exc->getMessage();
            }
        }

        /*Função para consultar dados na tabela por meio do campo "nome"*/
        function consultar(){

            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("select * from cursos where nome like ?");//Selecionando todos os campos ligados ao nome passado pelo parâmetro ainda não definido
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//Definindo o parâmetro
                $sql->execute();
                return $sql->fetchAll();//Retorna uma matriz com os dados selecionados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao executar consultar ".$exc->getMessage();
            }

        }

        /*Função para excluir um registro da tabela*/
        function exclusao(){

            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("delete * from cursos where codcurso = ?");//Deletando o registro que tenha o codcurso passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getCodCurso(), PDO::PARAM_STR);//Definindo o parâmetro

                if($sql->execute() == 1){//Se a execução do código sql ocorrer sem erros

                    return "Excluido com sucesso!";

                }else{

                    return "Erro na exclusão";
                }

                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao excluir ".$exc->getMessage();

            }

        }

        /*Função para listar todos os registros da tabela*/
        function listar(){

            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("select * from cursos order by nome");//Selecionando todos os registros de "cursos" e ordenando em ordem alfabética
                $sql->execute();
                return $sql->fetchAll();//Retorna uma matriz com os dados selecionados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao executar listagem ".$exc->getMessage();

            }

        }
    }
?>