<?php
// private $id_pedido;
// private $status_pedido;
// private $data_pedido;
// private $id_comanda_pedido;
// private $id_mesa_pedido;
    class Pedido {
        private $id_pedido;
        private $status_pedido;
        private $data_pedido;
        private $id_comanda_pedido;
        private $id_mesa_pedido;

        function getId_pedido() {
            return $this-> id_pedido;
        }

        function setId_pedido($id_pedido) {
            return $this-> id_pedido = $id_pedido;
        }
    }
?>