<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
   
?>

<h1>Liste des topics</h1>

<h2><?= $category->getNomDeCategorie() ?></h2>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <?= $topic->getUtilisateur() ?> le <?=$topic->getDateCreationFr()  ?>
    <?=$topic-> getConvertVerouillage() ;
      ?> </p>
<?php };
?>
 
 <form action="index.php?ctrl=forum&action=addSujetCategory&id=<?= $category->getId() ?>" method="POST">
<input type="text" placeholder="Titre" name="titre"><br>

<textarea type="textarea" placeholder="Message" name="message" rows="10"></textarea><br>
<input type="submit" name="submit" value="Rajouter">

 </form>
 
