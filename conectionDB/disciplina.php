<?php
    include_once 'conectar.php';

    class Disciplina{

        /*Atributos*/

        private $codDisciplina;
        private $nomeDisciplina;
        private $conn;//Futura instância de Conectar

        /*Getters e Setters*/

        public function getCodDisciplina(){
            return $this->codDisciplina;
        }
        public function setCodDisciplina($codDisciplinaF){
            $this->codDisciplina = $codDisciplinaF;
        }

        public function getNomeDisciplina(){
            return $this->nomeDisciplina;
        }
        public function setNomeDisciplina($nomeDisciplinaF){
            $this->nomeDisciplina = $nomeDisciplinaF;
        }

        /*Métodos para realizar as ações de manutenção do banco de dados*/

        /*Função para salvar um novo registro*/
        function salvar(){
            try{
                
                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("insert into disciplinas values (null,?)");//Inserindo por código sql um novo registro, com 1 parâmetro ainda não definido
                @$sql->bindParam(1, $this->getNomeDisciplina(), PDO::PARAM_STR);//Defindo primeiro parâmetro ($nomeDisciplina)

                
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
                $sql = $this->conn->prepare("select * from disciplinas where CodDisciplina = ?");//Selecionando todos os campos de "disciplinas" com o CodDisciplina passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getCodDisciplina(), PDO::PARAM_STR);//Definindo o parâmetro
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
                $sql = $this->conn->prepare("update disciplinas set NomeDisciplina = ? where CodDisciplina = ?");//Atualizando os campos do registro passando parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getNomeDisciplina(), PDO::PARAM_STR);//Definindo primeiro parâmetro
                @$sql->bindParam(2, $this->getCodDisciplina(), PDO::_PARAM_STR);//Definindo segundo parâmetro

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
                $sql = $this->conn->prepare("select * from disciplinas where NomeDisciplina like ?");//Selecionando todos os campos ligados ao nome passado pelo parâmetro ainda não definido
                @$sql->bindParam(1, $this->getNomeDisciplina(), PDO::PARAM_STR);//Definindo o parâmetro
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
                $sql = $this->conn->prepare("delete * from disciplinas where CodDisciplina = ?");//Deletando o registro que tenha o CodDisciplina passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getCodDisciplina(), PDO::PARAM_STR);//Definindo o parâmetro

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
                $sql = $this->conn->prepare("select * from disciplinas order by NomeDisciplina");//Selecionando todos os registros de "disciplinas" e ordenando em ordem alfabética
                $sql->execute();
                return $sql->fetchAll();//Retorna uma matriz com os dados selecionados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao executar listagem ".$exc->getMessage();

            }

        }
    }
?>