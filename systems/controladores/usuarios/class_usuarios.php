<?php 
    require_once ("../../../conexao/DBController.php");
    class Usuarios {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addUsuario($nome,
                            $email,
                            $senha
                           ) {
            $query = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $paramType = "sss";
            $paramValue = array($nome, $email, $senha);
            $insertIdPessoa= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdPessoa;
        }

        function editUsuario($id, $pontos, $nome, $email, $senha, $imagem, $tipo, $ativo, $updated_at) {
            $query = "UPDATE usuarios SET id = ?, pontos = ?, nome = ?, email = ?, senha = ?, imagem = ?, tipo = ?, ativo = ?, updated_at = ? WHERE id = $id";
            $paramType = "iissssiis";
            $paramValue = array($id, $pontos, $nome, $email, $senha, $imagem, $tipo, $ativo, $updated_at);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getUsuarioById($id) {
            $query = "SELECT * FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function setValidaEmailById($id, $confirmEmail) {
            $query = "UPDATE usuarios SET id = ?, confirm_email WHERE id = $id";
            $paramType = "ii";
            $paramValue = array($id, $confirmEmail);
            $this->db_handle->update($query, $paramType, $paramValue);
            
        }

        function getNomeById($id) {
            $pessoa = null;
            $query = "SELECT nome FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $nome) {
                $pessoa = $nome['nome'];
            }
            return $pessoa;
        }
        
        function getUsuarioByEmail($email) {
            $query = "SELECT * FROM usuarios WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function getUsuarioByName($nome) {
            $query = "SELECT * FROM usuario WHERE nome LIKE ?";
            $paramType = "s";
            $paramValue = array($nome);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getAllUsuarios() {
            $query = "SELECT * FROM usuarios ORDER BY nome ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }
    }
?>