<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class MessageManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Message";
    protected $tableName = "message";

    public function __construct(){
        parent::connect();
    }
    // on indique la class POO et la table correspandante en BDD pour le MessageManager
    public function findMessagesBySujet($id) {
        $sql = "SELECT * 
        FROM ".$this->tableName." m 
        WHERE m.sujet_id = :id";

// la requête renvoie plusieurs enregistrements --> getMultipleResults
return  $this->getMultipleResults(
    DAO::select($sql, ['id' => $id]), 
    $this->className
);

    }


}