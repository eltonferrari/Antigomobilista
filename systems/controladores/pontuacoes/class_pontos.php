<?php 
    require_once ("../../../conexao/DBController.php");
    class Pontos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addPontos($idCriador,
                           $nivel,
                           $pontoInicial,
                           $pontoFinal
                          ) {
            $query = "INSERT INTO pontuacoes (id_criador, 
                                              nivel,
                                              ponto_inicial,
                                              ponto_final
                                             )
                        VALUES (?, ?, ?, ?)";
            $paramType = "iiii";
            $paramValue = array($idCriador,
                                $nivel,
                                $pontoInicial,
                                $pontoFinal,
                               );
            $insertIdPonto= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdPonto;
        }

        function buscaUltimoId() {
            $query = "SELECT MAX(id) as ultimo FROM pontuacoes";
            $result = $this->db_handle->runBaseQuery($query);
            $ultimoNivel = $result[0]['ultimo'];
            return $ultimoNivel;
        }
        
        function getNivelById($id) {
            $query = "SELECT * FROM pontuacoes WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function insertNovoNivel($idCriador) {
            $ultimoId = new Pontos();
            $nivel = new Pontos();
            $proximoNivel = new Pontos;
            $ultimoId = $ultimoId->buscaUltimoId();
            $nivel = $nivel->getNivelById($ultimoId);
            foreach ($nivel as $n) {
                $nivel = $n['nivel'];
                $pontoInicial = $n['ponto_inicial'];
                $pontoFinal = $n['ponto_final'];
            }
            $nivel = $nivel + 1;
            $qtddPontos = $pontoFinal - $pontoInicial;
            $qtddPontos = $qtddPontos * 1.1;
            $pontoInicial = $pontoFinal + 1;
            $pontoFinal = (int)($pontoInicial + $qtddPontos);
            $proximoNivel = $proximoNivel->addPontos($idCriador, $nivel, $pontoInicial, $pontoFinal);
            return $proximoNivel;
        }

        function getAllPontos() {
            $query = "SELECT * FROM pontuacoes ORDER BY id ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }
    }
?>