<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Categorie extends Entity{

    private $id;
    private $nomDeCategorie;

    // chaque entité aura le même constructeur grâce à la méthode hydrate (issue de App\Entity)
    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

   

    /**
     * Get the value of nomDeCategorie
     */ 
    public function getNomDeCategorie()
    {
        return $this->nomDeCategorie;
    }

    /**
     * Set the value of nomDeCategorie
     *
     * @return  self
     */ 
    public function setNomDeCategorie($nomDeCategorie)
    {
        $this->nomDeCategorie = $nomDeCategorie;

        return $this;
    }

    public function __tostring() {
        return $this->nomDeCategorie;
    }
}