<?php
// private $id_cliente;
// private $status_cliente;
// private $data_cliente;
// private $id_comanda_cliente;
// private $id_mesa_cliente;
class ClienteDAO{
    
    public function create(Cliente $cliente) {
        try {
            $sql = "INSERT INTO cliente (                   
                  id_comanda_cliente, id_mesa_cliente, data_cliente)
                  VALUES (
                  :id_comanda_cliente, :id_mesa_cliente, now())";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_comanda_cliente", $cliente->getId_comanda_cliente());
            $p_sql->bindValue(":id_mesa_cliente", $cliente->getId_mesa_cliente());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao criar cliente <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM cliente order by id_comanda_cliente asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaClientes($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar as clientes." . $e;
        }
    }
     
    public function update(cliente $cliente) {
        try {
            $sql = "UPDATE cliente set
                
                id_comanda_cliente=:id_comanda_cliente,
                id_mesa_cliente=:id_mesa_cliente,
                status_cliente=:status_cliente
                                                                       
                  WHERE id_cliente = :id_cliente";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_comanda_cliente", $cliente->getId_comanda_cliente());
            $p_sql->bindValue(":id_mesa_cliente", $cliente->getId_mesa_cliente());
            $p_sql->bindValue(":status_cliente", $cliente->getStatus_cliente());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer atualização do cliente <br> $e <br>";
        }
    }

    public function delete(cliente $cliente) {
        try {
            $sql = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_cliente", $cliente->getId_cliente());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao excluir cliente<br> $e <br>";
        }
    }    

    private function listaClientes($row) {
        $cliente = new cliente();
        $cliente->setId_cliente($row['id_cliente']);
        $cliente->setId_comanda_cliente($row['id_comanda_cliente']);
        $cliente->setId_mesa_cliente($row['id_mesa_cliente']);
        $cliente->setData_cliente($row['data_cliente']);

        return $cliente;
    }
 }

?>