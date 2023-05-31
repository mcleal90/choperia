<?php
// private $id_produto;
// private $nome_produto;
// private $descricao_produto;
// private $valor_produto;
// private $status_produto;
class ProdutoDAO{
    
    public function create(Produto $produto) {
        try {
            $sql = "INSERT INTO produto (                   
                  nome_produto, descricao_produto, valor_produto)
                  VALUES (
                  :nome_produto, :descricao_produto, :valor_produto)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome_produto", $produto->getNome_produto());
            $p_sql->bindValue(":descricao_produto", $produto->getDescricao_produto());
            $p_sql->bindValue(":valor_produto", $produto->getValor_produto());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao criar produto <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM produto order by nome_produto asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaProdutos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar os produtos." . $e;
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

    private function listaProdutos($row) {
        $produto = new produto();
        $produto->setId_produto($row['id_produto']);
        $produto->setNome_produto($row['nome_produto']);
        $produto->setDescricao_produto($row['descricao_produto']);
        $produto->setValor_produto($row['valor_produto']);
        $produto->setStatus_produto($row['status_produto']);

        return $produto;
    }
 }
 ?>