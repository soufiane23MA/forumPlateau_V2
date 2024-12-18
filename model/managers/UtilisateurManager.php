<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UtilisateurManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Utilisateur";
    protected $tableName = "utilisateur";

    public function __construct(){
        parent::connect();
    }
    /**
     * cretaion des 2 fonction qui permettent 
     */

    public function findOneByEmail($email){
          $sql =  "SELECT * FROM ".
        $this->tableName. " u  WHERE u.email = :email";
        return $this ->getOneOrNullResult(
            DAO:: select ($sql,['email'=>$email], false),
            $this->className
            
        );
        
    }
    public function findOneByUser($nickname){
        $sql = "SELECT *
                FROM ".$this->tableName." u
                WHERE u.pseudo = :pseudo";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $nickname], false), 
            $this->className
        );
    }
    public function retrievePassword($email){

        $sql = "SELECT *
        FROM ".$this->tableName." u
        WHERE u.email = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false), 
            $this->className
        );
    }
}