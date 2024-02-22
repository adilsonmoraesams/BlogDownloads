<?php


namespace App\Data;

use App\Models\Filme;
use Exception;
use Helpers\PaginationHelper;
use PDO;
use PDOException;
use System\Database;
use System\Logs;

class FilmeRepository
{
    private $conn;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getInstance();
    }


    /* 
    * Listar todos
    */
    public function getFilmes($pagination = null, $ano = null, $genero = null, $categoria = null)
    {
        try {

            $sql = "SELECT * FROM Filme WHERE 1 = 1 ";

            if ($ano != null) {
                $sql .= " AND  AnoLancamento = :AnoLancamento ";
            }

            if ($genero != null) {
                $sql .= " AND upper(Genero) LIKE upper('%{$genero}%') ";
            }

            if ($categoria != null) {
                $sql .= " AND  UPPER(Categoria) = UPPER(:Categoria) ";
            }

            $sql = $this->db->getSql(
                $sql . " ORDER BY DataPublicacao DESC ",
                $pagination
            );

            $stmt = $this->conn->prepare($sql);

            if ($ano != null)
                $stmt->bindValue(':AnoLancamento', $ano);

            if ($categoria != null)
                $stmt->bindValue(':Categoria', $categoria);

            $stmt->execute();

            return array(                
                'pagination' => PaginationHelper::Paginate($pagination, $this->getCount($ano, $genero, $categoria)),
                'result' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            );
        } catch (Exception $e) {
            Logs::Registrar($e->getMessage());
            throw new Exception('Erro ao listar editar Filme:' . $e->getMessage());
        }
    }


    public function getAnoLancamentoGroup()
    {
        try {
            $stmt = $this->conn->prepare(' SELECT AnoLancamento FROM Filme GROUP BY AnoLancamento ORDER BY AnoLancamento DESC ');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logs::Registrar($e->getMessage());
            throw new Exception('Erro ao listar editar Filme:' . $e->getMessage());
        }
    }

    public function getGeneroGroup()
    {
        try {
            $stmt = $this->conn->prepare(' SELECT Genero FROM Filme GROUP BY Genero ');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logs::Registrar($e->getMessage());
            throw new Exception('Erro ao listar editar Filme:' . $e->getMessage());
        }
    }


    public function getCount($ano = null, $genero = null, $categoria = null)
    {
        try {
            
            $sql = ' SELECT count(*) AS COUNT FROM Filme WHERE 1 = 1 ';

            if ($ano != null) {
                $sql .= " AND  AnoLancamento = :AnoLancamento ";
            }

            if ($genero != null) {
                $sql .= " AND upper(Genero) LIKE upper('%{$genero}%') ";
            }

            if ($categoria != null) {
                $sql .= " AND  UPPER(Categoria) = UPPER(:Categoria) ";
            }

            $stmt = $this->conn->prepare($sql);

            if ($ano != null) $stmt->bindValue(':AnoLancamento', $ano);
            if ($categoria != null) $stmt->bindValue(':Categoria', $categoria);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC)["COUNT"];
        } catch (Exception $e) {
            Logs::Registrar($e->getMessage());
            throw new Exception('Erro ao listar editar Filme:' . $e->getMessage());
        }
    }

    /* 
    * Listar todos
    */
    public function getByIdFilmes($id)
    {
        try {

            $stmt = $this->conn->prepare(' SELECT * FROM Filme WHERE Id = :Id ');
            $stmt->bindValue(':Id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logs::Registrar($e->getMessage());
            throw new Exception('Erro ao consultar editar Filme:' . $e->getMessage());
        }
    }


    // /* 
    // * Inclusão de Filme
    // */
    // public function InsertFilme(Filme $Filme)
    // {
    //     try {
    //         $this->conn->beginTransaction();

    //         $stmt = $this->conn->prepare(
    //             'INSERT INTO Filme (Nome, DataNascimento) VALUES (:Nome, :DataNascimento)'
    //         );

    //         $stmt->bindValue(':Nome', $Filme->Nome);
    //         $stmt->bindValue(':DataNascimento', $Filme->DataNascimento);
    //         $stmt->execute();

    //         $this->conn->commit();

    //         return $this->getByIdFilmes($this->conn->lastInsertId());
    //     } catch (Exception $e) {
    //         Logs::Registrar($e->getMessage());
    //         throw new Exception('Erro ao incluir editar Filme:' . $e->getMessage());
    //     }
    // }


    // /* 
    // * Editar de Filme
    // */
    // public function EditarFilme(Filme $Filme, $id)
    // {
    //     try {
    //         $this->conn->beginTransaction();

    //         $stmt = $this->conn->prepare(
    //             'UPDATE  Filme SET 
    //                 Nome = :Nome, 
    //                 DataNascimento = :DataNascimento
    //             WHERE
    //                 Id = :Id '
    //         );

    //         $stmt->bindValue(':Id', $id);
    //         $stmt->bindValue(':Nome', $Filme->Nome);
    //         $stmt->bindValue(':DataNascimento', $Filme->DataNascimento);
    //         $stmt->execute();

    //         $this->conn->commit();

    //         return $this->getByIdFilmes($id);
    //     } catch (Exception $e) {
    //         Logs::Registrar($e->getMessage());
    //         throw new Exception('Erro ao tentar editar Filme:' . $e->getMessage());
    //     }
    // }


    // /* 
    // * Inclusão de Filme
    // */
    // public function ExcluirFilme(Filme $Filme)
    // {
    //     try {
    //         $this->conn->beginTransaction();

    //         $stmt = $this->conn->prepare(
    //             'DELETE FROM Filme WHERE Id = :Id '
    //         );
    //         $stmt->bindParam(':Id', $Filme->Id);
    //         $stmt->execute();

    //         $this->conn->commit();
    //     } catch (PDOException $e) {
    //         Logs::Registrar($e->getMessage());
    //         throw new Exception('Erro ao tentar excluído Filme:' . $e->getMessage());
    //     }
    // }
}
