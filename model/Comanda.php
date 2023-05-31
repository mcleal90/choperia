<?php
    class Comanda {
        private $id_comanda;
        private $numero_comanda;
        private $status_comanda;

        function getId_comanda() {
            return $this-> id_comanda;
        }

        function getNumero_comanda() {
            return $this-> numero_comanda;
        }
        
        function getStatus_comanda() {
            return $this-> status_comanda;
        }

        function setId_comanda($id_comanda) {
            return $this-> id_comanda = $id_comanda;
        }

        function setNumero_comanda($numero_comanda) {
            return $this-> numero_comanda = $numero_comanda;
        }
        
        function setStatus_comanda($status_comanda) {
            return $this-> status_comanda = $status_comanda;
        }
    }
?>