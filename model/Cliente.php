<?php
// private $id_cliente;
// private $status_cliente;
// private $data_cliente;
// private $id_comanda_cliente;
// private $id_mesa_cliente;
    class cliente {
        private $id_cliente;
        private $status_cliente;
        private $data_cliente;
        private $id_comanda_cliente;
        private $id_mesa_cliente;

        // GETTER
        function getId_cliente() {
            return $this-> id_cliente;
        }
        function getStatus_cliente() {
            return $this-> status_cliente;
        }
        function getData_cliente() {
            return $this-> data_cliente;
        }
        function getId_comanda_cliente() {
            return $this-> id_comanda_cliente;
        }
        function getId_mesa_cliente() {
            return $this-> id_mesa_cliente;
        }
        
        // SETTER
        function setId_cliente($id_cliente) {
            return $this-> id_cliente = $id_cliente;
        }
        function setStatus_cliente($status_cliente) {
        return $this-> status_cliente = $status_cliente;
        }
        function setData_cliente($data_cliente) {
            return $this-> data_cliente = $data_cliente;
        }
        function setId_comanda_cliente($id_comanda_cliente) {
            return $this-> id_comanda_cliente = $id_comanda_cliente;
        }
        function setId_mesa_cliente($id_mesa_cliente) {
            return $this-> id_mesa_cliente = $id_mesa_cliente;
        }
    }
?>