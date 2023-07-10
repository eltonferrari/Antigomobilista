<?php 
    require_once ("../../../conexao/DBController.php");
    class Paises {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function getPaisById($id) {
            $query = "SELECT * FROM paises WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $pais = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $pais;
        }

        function getNomeById($id) {
            $pais = null;
            $query = "SELECT nome FROM paises WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $nome) {
                $pais = $nome['nome'];
            }
            return $pais;
        }

        function getNameById($id) {
            $country = null;
            $query = "SELECT name FROM paises WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $name) {
                $country = $name['name'];
            }
            return $country;
        }

        function getBrasil() {
            $query = "SELECT * FROM paises WHERE nome = 'BRASIL'";
            $brasil = $this->db_handle->runBaseQuery($query);
            return $brasil;
        }        
        
        function getAllPaises() {
            $query = "SELECT * FROM paises ORDER BY nome ASC";
            $paises = $this->db_handle->runBaseQuery($query);
            return $paises;
        }
        
        function getAllCountries() {
            $query = "SELECT * FROM paises ORDER BY name ASC";
            $countries = $this->db_handle->runBaseQuery($query);
            return $countries;
        }
    }
?>