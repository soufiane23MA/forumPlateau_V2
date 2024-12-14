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
 <!--l'	action du formulaire donne l'adress url ou on va afficher le contenu du formulaire
 dans notre cas c'est des message qui vont être rajoutés dans le sujet qui porte ce id-->
<h3>Repondre</h3>
 <form action="index.php?ctrl=forum&action=addMessageTopic&id=<?= $sujet->getId() ?>" method="POST">
    <textarea name="repondre" id="repondre" rows="10"></textarea><br>
    <input type="submit" name="submit" value="repondre">
 </form>