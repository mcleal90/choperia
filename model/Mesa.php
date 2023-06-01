<?php
    class Mesa {
        private $id_mesa;
        private $numero_mesa;
        private $status_mesa;
        // GETTER
        function getId_mesa() {
            return $this-> id_mesa;
        }
        function getNumero_mesa() {
            return $this-> numero_mesa;
        }        
        function getStatus_mesa() {
            return $this-> status_mesa;
        }
        
        // SETTER        
        function setId_mesa($id_mesa) {
            return $this-> id_mesa = $id_mesa;
        }
        function setNumero_mesa($numero_mesa) {
            return $this-> numero_mesa = $numero_mesa;
        }        
        function setStatus_mesa($status_mesa) {
            return $this-> status_mesa = $status_mesa;
        }
    }
?>