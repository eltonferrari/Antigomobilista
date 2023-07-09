<?php 
    require_once ("../../../conexao/DBController.php");
    class Eventos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addEvento($idUsuario,
                           $imagem,
                           $nome,
                           $dataHoraInicio,
                           $dataHoraFim,
                           $endereco,
                           $bairro,
                           $cidade,
                           $idEstado,
                           $idPais,
                           $descricao,
                           $autorizado
                           ) {
            $query = "INSERT INTO eventos (id_usuario,
                                           imagem,
                                           nome,
                                           data_hora_inicio,
                                           data_hora_fim,
                                           endereco,
                                           bairro,
                                           cidade,
                                           id_estado,
                                           id_pais
                                           descricao,
                                           autorizado)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "isssssssiisi";
            $paramValue = array($idUsuario,
                                $imagem,
                                $nome,
                                $dataHoraInicio,
                                $dataHoraFim,
                                $endereco,
                                $bairro,
                                $cidade,
                                $idEstado,
                                $idPais,
                                $descricao,
                                $autorizado
                                );
            $insertIdEvento= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdEvento;
        }

        function editEvento($idUsuario,
                            $imagem,
                            $nome,
                            $dataHoraInicio,
                            $dataHoraFim,
                            $endereco,
                            $bairro,
                            $cidade,
                            $idEstado,
                            $idPais,
                            $descricao,
                            $autorizado,
                            $id
                            ) {
            $query = "UPDATE eventos 
                        SET id_usuario = ?, 
                            imagem = ?,
                            nome = ?, 
                            data_hora_inicio = ?,
                            data_hora_fim = ?,
                            endereco = ?, 
                            bairro = ?,
                            cidade = ?, 
                            id_estado = ?,
                            id_pais = ?,
                            descricao = ?, 
                            autorizado = ?,
                            updated_at = ?,
                        WHERE id = ?";
            $paramType = "isssssssiisisi";
            $paramValue = array($idUsuario,
                                $imagem,
                                $nome,
                                $dataHoraInicio,
                                $dataHoraFim,
                                $endereco,
                                $bairro,
                                $cidade,
                                $idEstado,
                                $idPais,
                                $descricao,
                                $autorizado,
                                $id
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
        
        function getEventoByIdUsuario($idUsuario) {
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
            $query = "SELECT * FROM eventos ORDER BY data_hora_inicio ASC";
            $evento = $this->db_handle->runBaseQuery($query);
            return $evento;
        }
    }
?>