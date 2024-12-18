<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Utilisateur extends Entity{

    private $id;
    private $pseudo;
    private $motDePasse;
    private $dateInscreption;
    private $email;
    private $roleUtilisateur;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of motDePasse
     */ 
    public function getMotDepasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDepasse
     *
     * @return  self
     */ 
    public function setMotDepasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get the value of dateInscreption
     */ 
    public function getDateInscreption()
    {
        return $this->dateInscreption;
    }

    /**
     * Set the value of dateInscreption
     *
     * @return  self
     */ 
    public function setDateInscreption($dateInscreption)
    {
        $this->dateInscreption = $dateInscreption;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Get the value of roleUtilisateur
     */ 
    public function getRoleUtilisateur()
    {
        return $this->roleUtilisateur;
    }

    /**
     * Set the value of roleUtilisateur
     *
     * @return  self
     */ 
    public function setRoleUtilisateur($roleUtilisateur)
    {
        $this->roleUtilisateur = $roleUtilisateur;

        return $this;
    }
    
    public function __tostring() {
        return $this->pseudo;
    }
}