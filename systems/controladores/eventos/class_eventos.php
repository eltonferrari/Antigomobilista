<?php 
    require_once ("../../../conexao/DBController.php");
    class Eventos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addEvento($idUsuario,
                           $nome,
                           $dataInicio,
                           $dataFim,
                           $horário,
                           $endereco,
                           $cidade,
                           $idEstado,
                           $descricao,
                           $imagem,
                           $autorizado
                           ) {
            $query = "INSERT INTO eventos (id_usuario,
                                           nome,
                                           data_inicio,
                                           data_fim,
                                           horario,
                                           endereco,
                                           cidade,
                                           id_estado,
                                           descricao,
                                           imagem,
                                           autorizado)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "issssssissi";
            $paramValue = array($idUsuario,
                                $nome,
                                $dataInicio,
                                $dataFim,
                                $horário,
                                $endereco,
                                $cidade,
                                $idEstado,
                                $descricao,
                                $imagem,
                                $autorizado
                                );
            $insertIdEvento= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdEvento;
        }

        function editEvento($id,
                            $idUsuario,
                            $nome,
                            $dataInicio,
                            $dataFim,
                            $horário,
                            $endereco,
                            $cidade,
                            $idEstado,
                            $descricao,
                            $imagem,
                            $autorizado,
                            $updatedAt
                            ) {
            $query = "UPDATE eventos 
                        SET id = ?, 
                            id_usuario = ?, 
                            nome = ?, 
                            data_inicio = ?, 
                            data_fim = ?, 
                            horario = ?,
                            endereco = ?, 
                            cidade = ?, 
                            id_estado = ?, 
                            descricao = ?, 
                            imagem = ?,
                            autorizado = ?,
                            updated_at = ? 
                        WHERE id = $id";
            $paramType = "iissssssissis";
            $paramValue = array($id,
                                $idUsuario,
                                $nome,
                                $dataInicio,
                                $dataFim,
                                $horário,
                                $endereco,
                                $cidade,
                                $idEstado,
                                $descricao,
                                $imagem,
                                $autorizado,
                                $updatedAt
                                );
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getEventoById($id) {
            $query = "SELECT * FROM eventos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $evento = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $evento;
        }
        
        function getEventoByUsuario($idUsuario) {
            $query = "SELECT * FROM eventos WHERE id_usuario = $idUsuario";
            $paramType = "i";
            $paramValue = array($idUsuario);
            $evento = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $evento; 
        }

        function getNomeEventoById($id) {
            $evento = null;
            $query = "SELECT nome FROM eventos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $nome) {
                $evento = $nome['nome'];
            }
            return $evento;
        }

        function getAllEventos() {
            $query = "SELECT * FROM eventos ORDER BY data ASC";
            $evento = $this->db_handle->runBaseQuery($query);
            return $evento;
        }
    }
?>