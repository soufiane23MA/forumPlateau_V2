<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

//c'est la classe Topic sur le framwork.
class SujetManager extends Manager{  

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Sujet";
    protected $tableName = "sujet";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les sujets d'une catégorie spécifique (par son id)// (topic =>sujet)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." s 
                WHERE s.categorie_id = :id
                ORDER BY dateDeCreation DESC";// requête affiche les sujet par ordere
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }
}