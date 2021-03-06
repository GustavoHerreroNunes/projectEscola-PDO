<?php
    include_once 'conectar.php';

    class Aluno{

        /*Atributos*/

        private $matricula;
        private $nome;
        private $endereco;
        private $cidade;
        private $codCurso;
        private $conn;//Futura instância de Conectar

        /*Getters e Setters*/

        public function getMatricula(){
            return $this->matricula;
        }
        public function setMatricula($matriculaF){
            $this->matricula = $matriculaF;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nomeF){
            $this->nome = $nomeF;
        }

        public function getEndereco(){
            return $this->endereco;
        }
        public function setEndereco($enderecoF){
            $this->endereco = $enderecoF;
        }

        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidadeF){
            $this->cidade = $cidadeF;
        }

        public function getCodCurso(){
            return $this->codCurso;
        }
        public function setCodCurso($codCursoF){
            $this->codCurso = $codCursoF;
        }

        /*Métodos para realizar as ações de manutenção do banco de dados*/

        /*Função para salvar um novo registro*/
        function salvar(){
            try{
                
                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("insert into alunos values (?,?,?,?,?)");//Inserindo por código sql um novo registro, com 5 parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getMatricula(), PDO::PARAM_STR);//Defindo primeiro parâmetro ($matricula)
                @$sql->bindParam(2, $this->getNome(), PDO::PARAM_STR);//Defindo segundo parâmetro ($nome)
                @$sql->bindParam(3, $this->getEndereco(), PDO::PARAM_STR);//Definindo terceiro parâmetro ($endereco)
                @$sql->bindParam(4, $this->getCidade(), PDO::PARAM_STR);//Definindo quarto parâmetro ($cidade)
                @$sql->bindParam(5, $this->getCodCurso(), PDO::PARAM_STR);//Definindo quinto parâmetro ($codCurso)

                
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
                $sql = $this->conn->prepare("select * from alunos where matricula = ?");//Selecionando todos os campos de "alunos" com a matricula passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getMatricula(), PDO::PARAM_STR);//Definindo o parâmetro
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
                $sql = $this->conn->prepare("update alunos set nome = ?, endereco = ?, cidade = ?, codcurso = ? where matricula = ?");//Atualizando os campos do registro passando parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//Definindo primeiro parâmetro
                @$sql->bindParam(2, $this->getEndereco(), PDO::PARAM_STR);//Definindo segundo parâmetro
                @$sql->bindParam(3, $this->getCidade(), PDO::_PARAM_STR);//Definindo terceiro parâmetro
                @$sql->bindParam(4, $this->getCodCurso(), PDO::_PARAM_STR);//Definindo quarto parâmetro
                @$sql->bindParam(5, $this->getMatricula(), PDO::_PARAM_STR);//Definindo quinto parâmetro

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
                $sql = $this->conn->prepare("select * from alunos where nome like ?");//Selecionando todos os campos ligados ao nome passado pelo parâmetro ainda não definido
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
                $sql = $this->conn->prepare("delete from alunos where matricula = ?");//Deletando o registro que tenha a matricula passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getMatricula(), PDO::PARAM_STR);//Definindo o parâmetro

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
                $sql = $this->conn->prepare("select * from alunos order by nome");//Selecionando todos os registros de "alunos" e ordenando em ordem alfabética
                $sql->execute();
                return $sql->fetchAll();//Retorna uma matriz com os dados selecionados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao executar listagem ".$exc->getMessage();

            }

        }
    }
?>