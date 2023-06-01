<?php
    class Produto {
        private $id_produto;
        private $nome_produto;
        private $descricao_produto;
        private $valor_produto;
        private $status_produto;

        // GETTER
        function getId_produto() {
            return $this-> id_produto;
        }        
        function getNome_produto() {
            return $this-> nome_produto;
        }        
        function getDescricao_produto() {
            return $this-> descricao_produto;
        }        
        function getValor_produto() {
            return $this-> valor_produto;
        }        
        function getStatus_produto() {
            return $this-> status_produto;
        }        
        // SETTER
        function setId_produto($id_produto) {
            return $this-> id_produto = $id_produto;
        }
        function setNome_produto($nome_produto) {
            return $this-> nome_produto = $nome_produto;
        }        
        function setDescricao_produto($descricao_produto) {
            return $this-> descricao_produto = $descricao_produto;
        }
        function setValor_produto($valor_produto) {
            return $this-> valor_produto = $valor_produto;
        }
        function setStatus_produto($status_produto) {
            return $this-> status_produto = $status_produto;
        }
    }
?>