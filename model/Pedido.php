<?php 
// $id_pedido
// $quantidade_pedido
// $adicional_pedido
// $observacao_pedido
// $id_pedido_pedido
// $id_produto_produtoitem
class pedido {
    private $id_pedido;
    private $quantidade_pedido;
    private $adicional_pedido;
    private $observacao_pedido;
    private $id_cliente_pedido;
    private $id_produto_produtoitem;

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
        function getId_pedido_pedido() {
            return $this-> id_cliente_pedido;
        }
        function getId_produto_produtoitem() {
            return $this-> id_produto_produtoitem;
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
        
        function setId_pedido_pedido($id_pedido_pedido) {
            $this->id_cliente_pedido = $id_pedido_pedido;
        }
        
        function setId_produto_produtoitem($id_produto_produtoitem) {
            $this->id_produto_produtoitem = $id_produto_produtoitem;
        }
}

?>