<?php
 namespace Model\Entities;

 use App\Entity;
 /*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/
final class Message extends Entity{

	private $id;
	private  $contenuDeMessage;
	private $dateDeCreationMessage;
	private $sujet;
	private $utilisateur;
	

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
	 * Get the value of contenuDeMessage
	 */ 
	public function getContenuDeMessage()
	{
		return $this->contenuDeMessage;
	}

	/**
	 * Set the value of contenuDeMessage
	 *
	 * @return  self
	 */ 
	public function setContenuDeMessage($contenuDeMessage)
	{
		$this->contenuDeMessage = $contenuDeMessage;

		return $this;
	}

	/**
	 * Get the value of dateDeCreation
	 */ 
	public function getDateDeCreationMessage()
	{
		return $this->dateDeCreationMessage;
	}
	// fonction qui permet l'affichage de la date et heure des massages.
	public function getDateCreationFr() {
		$date = new \DateTime($this->dateDeCreationMessage);
		return $date->format("d-m-Y H:i");
}
 

	/**
	 * Set the value of dateDeCreation
	 *
	 * @return  self
	 */ 
	public function setDateDeCreationMessage($dateDeCreationMessage)
	{
		$this->dateDeCreationMessage = $dateDeCreationMessage;

		return $this;
	}

	/**
	 * Get the value of sujet
	 */ 
	public function getSujet()
	{
		return $this->sujet;
	}

	/**
	 * Set the value of sujet
	 *
	 * @return  self
	 */ 
	public function setSujet($sujet)
	{
		$this->sujet = $sujet;

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
	// affichage du contenu avec _toString()
	public function _toString(){
		return $this->contenuDeMessage;
	}
}
