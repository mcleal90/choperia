<?php
// private $id_comanda;
// private $numero_comanda;
// private $status_comanda;
class ComandaDAO{
    
    public function create(Comanda $comanda) {
        try {
            $sql = "INSERT INTO comanda (                   
                  numero_comanda)
                  VALUES (
                  :numero_comanda)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":numero_comanda", $comanda->getNumero_comanda());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao criar comanda <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM comanda order by numero_comanda asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaComandas($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar as comandas." . $e;
        }
    }
     
    public function update(comanda $comanda) {
        try {
            $sql = "UPDATE comanda set
                
                  numero_comanda=:numero_comanda,
                  status_comanda=:status_comanda              
                                                                       
                  WHERE id_comanda = :id_comanda";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":numero_comanda", $comanda->getNumero_comanda());
            $p_sql->bindValue(":status_comanda", $comanda->getStatus_comanda());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer atualização da comanda <br> $e <br>";
        }
    }

    public function delete(comanda $comanda) {
        try {
            $sql = "DELETE FROM comanda WHERE id_comanda = :id_comanda";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_comanda", $comanda->getId_comanda());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao excluir comanda<br> $e <br>";
        }
    }    

    private function listaComandas($row) {
        $comanda = new comanda();
        $comanda->setId_comanda($row['id_comanda']);
        $comanda->setNumero_comanda($row['numero_comanda']);
        $comanda->setStatus_comanda($row['status_comanda']);

        return $comanda;
    }
 }

?>