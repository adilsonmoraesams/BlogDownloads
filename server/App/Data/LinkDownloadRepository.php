<?php


namespace App\Data;

use App\Models\Cliente;
use Exception;
use PDO;
use PDOException;
use System\Database;
use System\Logs;

class LinkDownloadRepository
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
    public function getLinksByFilme($idFime)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM LinkDownload WHERE IdFilme = :IdFilme ORDER BY id ASC ");
            $stmt->bindValue(':IdFilme', $idFime);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logs::Registrar($e->getMessage());
            throw new Exception('Erro ao listar Links:' . $e->getMessage());
        }
    }
 
}
