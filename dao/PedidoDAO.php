<?php
    // private $id_pedido;
    // private $quantidade_pedido;
    // private $adicional_pedido;
    // private $observacao_pedido;
    // private $id_cliente_pedido;
    // private $id_produto_pedido;
    // private $id_comanda_cliente_pedido;
class PedidoDAO{
    
    public function create(Pedido $pedido) {
        try {
            $sql = "INSERT INTO pedido (
                        id_cliente_pedido,
                        id_produto_pedido, 
                        quantidade_pedido, 
                        adicional_pedido, 
                        observacao_pedido) 
                    VALUES (
                        (select id_cliente from cliente where id_comanda_cliente = :id_comanda_cliente_pedido and status_cliente = '0'),
                        :id_produto_pedido, 
                        :quantidade_pedido, 
                        :adicional_pedido, 
                        :observacao_pedido)"; 

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_comanda_cliente_pedido", $pedido->getId_comanda_cliente_pedido());
            $p_sql->bindValue(":id_produto_pedido", $pedido->getId_produto_pedido());
            $p_sql->bindValue(":quantidade_pedido", $pedido->getQuantidade_pedido());
            $p_sql->bindValue(":adicional_pedido", $pedido->getAdicional_pedido());
            $p_sql->bindValue(":observacao_pedido", $pedido->getObservacao_pedido());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao criar pedido <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $id_clientes = $_GET['id_cliente'];
            $sql = 
            "SELECT 
                p.id_pedido,
                p.quantidade_pedido,
                p.adicional_pedido,
                p.observacao_pedido,
                p.id_cliente_pedido,
                p.id_produto_pedido,
                cli.id_comanda_cliente
            FROM 
                pedido p
                left join cliente cli on cli.id_cliente = p.id_cliente_pedido 
            WHERE
                p.id_cliente_pedido = $id_clientes
            ORDER BY
                p.id_pedido asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaPedidos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar os pedidos." . $e;
        }
    }
     
    public function update(produto $produto) {
        try {
            $sql = "UPDATE produto set
                
                  id_produto=:id_produto,
                  nome_produto=:nome_produto              
                  descricao_produto=:descricao_produto              
                  valor_produto=:valor_produto              
                  status_produto=:status_produto              
                                                                       
                  WHERE id_produto = :id_produto";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome_produto", $produto->getNome_produto());
            $p_sql->bindValue(":descricao_produto", $produto->getDescricao_produto());
            $p_sql->bindValue(":valor_produto", $produto->getValor_produto());
            $p_sql->bindValue(":status_produto", $produto->getStatus_produto());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer atualização do produto<br> $e <br>";
        }
    }

    public function delete(produto $produto) {
        try {
            $sql = "DELETE FROM produto WHERE id_produto = :id_produto";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_produto", $produto->getId_produto());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao excluir produto<br> $e <br>";
        }
    }    

    private function listaPedidos($row) {
        $pedido = new pedido();
        $pedido->setId_pedido($row['id_pedido']);
        $pedido->setId_cliente_pedido($row['id_cliente_pedido']);
        $pedido->setId_produto_pedido($row['id_produto_pedido']);
        $pedido->setId_comanda_cliente_pedido($row['id_comanda_cliente']);
        $pedido->setQuantidade_pedido($row['quantidade_pedido']);
        $pedido->setAdicional_pedido($row['adicional_pedido']);
        $pedido->setObservacao_pedido($row['observacao_pedido']);

        return $pedido;
    }
 }
 ?>