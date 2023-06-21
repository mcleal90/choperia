<?php 
class pedido {
    private $id_pedido;
    private $quantidade_pedido;
    private $adicional_pedido;
    private $observacao_pedido;
    private $id_cliente_pedido;
    private $id_produto_pedido;
    private $id_comanda_cliente_pedido;
    private $valor_produto_pedido;

        // GETTER
        function getId_pedido() {
            return $this-> id_pedido;
        }
        function getQuantidade_pedido() {
            return $this-> quantidade_pedido;
        }
        function getAdicional_pedido() {
            return $this-> adicional_pedido;
        }
        function getObservacao_pedido() {
            return $this-> observacao_pedido;
        }
        function getId_cliente_pedido() {
            return $this-> id_cliente_pedido;
        }
        function getId_produto_pedido() {
            return $this-> id_produto_pedido;
        }
        function getId_comanda_cliente_pedido() {
            return $this-> id_comanda_cliente_pedido;
        }
        function getValor_produto_pedido() {
            return $this-> valor_produto_pedido;
        }
        
        // SETTER
        function setId_pedido($id_pedido) {
            $this->id_pedido = $id_pedido;
        }
        
        function setQuantidade_pedido($quantidade_pedido) {
            $this->quantidade_pedido = $quantidade_pedido;
        }
        
        function setAdicional_pedido($adicional_pedido) {
            $this->adicional_pedido = $adicional_pedido;
        }
        
        function setObservacao_pedido($observacao_pedido) {
            $this->observacao_pedido = $observacao_pedido;
        }
        
        function setId_cliente_pedido($id_cliente_pedido) {
            $this->id_cliente_pedido = $id_cliente_pedido;
        }
        
        function setId_produto_pedido($id_produto_pedido) {
            $this->id_produto_pedido = $id_produto_pedido;
        }
        function setId_comanda_cliente_pedido($id_comanda_cliente_pedido) {
            $this->id_comanda_cliente_pedido = $id_comanda_cliente_pedido;
        }
        function setValor_produto_pedido($valor_produto_pedido) {
            $this->valor_produto_pedido = $valor_produto_pedido;
        }
}

?>