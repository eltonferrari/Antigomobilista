<?php 
    require_once ("../../../conexao/DBController.php");

    class Pontuacoes {
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
            $ultimoId = new Pontuacoes();
            $nivel = new Pontuacoes();
            $proximoNivel = new Pontuacoes;
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

        function getRegistroByPontos($pontos) {
            $query = "SELECT * FROM pontuacoes WHERE ponto_inicial <= $pontos AND ponto_final >= $pontos";
            $registro = $this->db_handle->runBaseQuery($query);
            return $registro;
        }

        function getPorcentagemById($id) {
            $pontos = new Usuarios();
            $pontos = $pontos->getPontosById($id);
            $registro = new Pontuacoes();
            $registro = $registro->getRegistroByPontos($pontos);
            foreach ($registro as $r) {
                $pontoInicial = $r['ponto_inicial'];
                $pontoFinal   = $r['ponto_final'];
            }
            $diferencaTotal = $pontoFinal - $pontoInicial;
            $diferencaInicial = $pontos - $pontoInicial;
            $porcentagem = ( (100 / ((double) $diferencaTotal) ) * ( (double) $diferencaInicial) );
            return ( (int) $porcentagem);
        }

        function getAllPontos() {
            $query = "SELECT * FROM pontuacoes ORDER BY id ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }
    }
?>