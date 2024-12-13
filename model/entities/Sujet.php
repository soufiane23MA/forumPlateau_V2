<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Sujet extends Entity{

    private $id;
    private $titreDeSujet;
    private $utilisateur;
    private $categorie;
    private $dateDeCreation;
    private $verrouillage;

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
     * Get the value of titreDeSujet
     */ 
    public function getTitreDeSujet()
    {
        return $this->titreDeSujet;
    }

    /**
     * Set the value of titreDeSujet
     *
     * @return  self
     */ 
    public function setTitreDeSujet($titreDeSujet)
    {
        $this->titreDeSujet = $titreDeSujet;

        return $this;
    }

    /**
     * Get the value of utilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of dateDeCreation
     */ 
    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }
    // la fonction qui permet de convertir la date en format français.

    public function getDateCreationFr() {
        $date = new \DateTime($this->dateDeCreation);
        return $date->format("d-m-Y H:i");
    }
    

    /**
     * Set the value of dateDeCreation
     *
     * @return  self
     */ 
    public function setDateDeCreation($dateDeCreation)
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    /**
     * Get the value of verrouillage
     */ 
    public function getVerrouillage()
    {
        return $this->verrouillage;
    }

    /**
     * Set the value of verrouillage
     *
     * @return  self
     */ 
    public function setVerrouillage($verrouillage)
    {
        $this->verrouillage = $verrouillage;

        return $this;
    }
    public function getConvertVerouillage(){
        if($this->verrouillage  ==  1){
            return $verrouillage = "(Verrouillé)";

        }
    }

    public function __tostring() {
        return $this->titreDeSujet;
    }
}