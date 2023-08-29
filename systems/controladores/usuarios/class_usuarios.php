<?php

use LDAP\Result;

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

        function getTermosCondicoesById($id) {
            $query = "SELECT termos_condicoes FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach ($result as $tc) {
                $termosCondicoes = $tc['termos_condicoes'];
            }
            return $termosCondicoes;
        }

        function getValidaEmailById($id) {
            $query = "SELECT confirm_email FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach ($result as $ce) {
                $confirmEmail = $ce['confirm_email'];
            }
            return $confirmEmail;
        }
        
        function editUsuario($pontos, 
                             $nome, 
                             $email, 
                             $senha, 
                             $imagem, 
                             $tipo, 
                             $ativo, 
                             $updatedAt,
                             $id
                            ) {
            $query = "UPDATE usuarios 
                        SET pontos = ?, 
                            nome = ?, 
                            email = ?, 
                            senha = ?, 
                            imagem = ?, 
                            tipo = ?, 
                            ativo = ?, 
                            updated_at = ? 
                        WHERE id = ?";
            $paramType = "issssiisi";
            $paramValue = array($pontos, 
                                $nome, 
                                $email, 
                                $senha, 
                                $imagem, 
                                $tipo, 
                                $ativo, 
                                $updatedAt,
                                $id
                               );
            $this->db_handle->update($query, $paramType, $paramValue);
        }
        function editTermosById($id) {
            $query = "UPDATE usuarios SET termos_condicoes = 1 WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function alteraNomeById($nome, $updatedAt , $id) {
            $query = "UPDATE usuarios SET nome = ?, updated_at = ? WHERE id = ?";
            $paramType = "ssi";
            $paramValue = array($nome, $updatedAt, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getUsuarioById($id) {
            $query = "SELECT * FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
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

        function getEmailById($id) {
            $query = "SELECT email FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $e) {
                $email = $e['email'];
            }
            return $email;
        }

        function getTipoById($id) {
            $pessoa = null;
            $query = "SELECT tipo FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $user) {
                $tipo = $user['tipo'];
            }
            return $tipo;
        }

        function getImagemById($id) {
            $imagem = null;
            $query = "SELECT imagem FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $foto) {
                $imagem = $foto['imagem'];
            }
            return $imagem;
        }
        
        function alteraImagemPerfil($imagem, $updatedAt, $id) {
            $query = "UPDATE usuarios SET imagem = ?,  updated_at = ? WHERE id = ?";
            $paramType = "ssi";
            $paramValue = array($imagem, $updatedAt, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }  

        function getUsuarioByEmail($email) {
            $query = "SELECT * FROM usuarios WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function getUsuarioByName($nome) {
            $query = "SELECT * FROM usuarios WHERE nome LIKE ?";
            $paramType = "s";
            $paramValue = array($nome);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getPontosById($id) {
            $query = "SELECT pontos FROM usuarios WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $p) {
                $pontos = $p['pontos'];
            }
            return $pontos;
        }

        function getNivelByIdUser($id) {
            $pontos = new Usuarios();
            $registro = new Pontuacoes();
            $pontos = $pontos->getPontosById($id);
            $registro = $registro->getRegistroByPontos($pontos);
            foreach ($registro as $r) {
                $nivel = $r['nivel'];
            }
            return $nivel;
        }
        
        function getAllUsuarios() {
            $query = "SELECT * FROM usuarios ORDER BY nome ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }
    }
?>