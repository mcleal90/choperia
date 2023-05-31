<?php
// $this->idmesa = $id_mesa;
// $this->numero_mesa = $numero_mesa;
// $this->status = $status_mesa;
class MesaDAO{
    
    public function create(Mesa $mesa) {
        try {
            $sql = "INSERT INTO mesa (                   
                  numero_mesa)
                  VALUES (
                  :numero_mesa)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":numero_mesa", $mesa->getNumero_mesa());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao criar mesa <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM mesa order by numero_mesa desc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaMesas($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar as mesas." . $e;
        }
    }
     
    public function update(mesa $mesa) {
        try {
            $sql = "UPDATE mesa set
                
                  numero_mesa=:numero_mesa,
                  status_mesa=:status_mesa              
                                                                       
                  WHERE id_mesa = :id_mesa";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":numero_mesa", $mesa->getNumero_mesa());
            $p_sql->bindValue(":status_mesa", $mesa->getStatus_mesa());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer atualização <br> $e <br>";
        }
    }

    public function delete(mesa $mesa) {
        try {
            $sql = "DELETE FROM mesa WHERE id_mesa = :id_mesa";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_mesa", $mesa->getId_mesa());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao excluir mesa<br> $e <br>";
        }
    }    

    private function listaMesas($row) {
        $mesa = new mesa();
        $mesa->setId_Mesa($row['id_mesa']);
        $mesa->setNumero_mesa($row['numero_mesa']);
        $mesa->setStatus_mesa($row['status_mesa']);

        return $mesa;
    }
 }
 ?>