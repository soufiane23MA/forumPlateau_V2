<?php 
$messages = $result["data"]['messages']; 
$sujet =$result["data"]['sujet'];
?>

<h1>Liste des messages</h1>

<h2><?=$sujet->getTitreDeSujet()?></h2>

<?php
foreach($messages as $message ){ ?>
	<p><?= $message->getContenuDeMessage() ?> le <?= $message->getDateCreationFr()?> 
		par <?= $message->getUtilisateur()?></p>
		
<?php }
 
?>