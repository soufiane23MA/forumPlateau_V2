<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\SujetManager;
use Model\Managers\MessageManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategorieManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["nomDeCategorie", "ASC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];


    }

    public function listTopicsByCategory($id) {

        $topicManager = new SujetManager();
        $categoryManager = new CategorieManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);
 
        return [
            "view" => VIEW_DIR."forum/listSujets.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }
    public function listMessagesBySujet($id){
        $messageManager = new MessageManager();
        $sujetManager = new SujetManager();
        $sujet = $sujetManager->findOneById($id);//cherche le sujet qui a ce id 
        $messages = $messageManager->findMessagesBySujet($id);// cherche les message apartenir au sujet avec cet id
        
        return [    
            "view" => VIEW_DIR."forum/listMessages.php",
            "meta_description" => "Liste des message par sujet : ".$sujet,
            "data" => [
                "sujet" => $sujet,
                "messages" => $messages
                
            ]
           
            ]; 

    }
    //instancier un nouveau manager de la classe messageManager (responsable de rajouter,
    // suprimer et modifier les messages) 
    // ce qui va être soumis par l'utilisateur,et le rajouter dans la base de données
    // ajouter un message dans le sujet qui a le id dans les paramêtre de la fonction
    //Cette condition vérifie si le formulaire a été soumis. Le bouton de soumission 
    //du formulaire est attendu avec un attribut name="submit".
    //La fonction filter_input récupère la valeur de l'entrée 'repondre' envoyée via la méthode POST.

    public function addMessageTopic($id) {
        $messageManager = new MessageManager();

        if(isset($_POST["submit"])) {//
             
           
           $message = filter_input(INPUT_POST, "repondre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           //Cette condition vérifie si un message valide a été saisi (non vide et non nul après la validation).
           //La méthode add de la classe MessageManager est appelée pour insérer un nouveau message dans la base de données.
           //Un tableau associatif est passé en paramètre, contenant
           //contenuDeMessage : le texte du message saisi par l'utilisateur.
           //sujet_id : l'identifiant du sujet auquel le message appartient (reçu en paramètre $id).
           //utilisateur_id : l'identifiant de l'utilisateur qui a posté le message (ici, fixé à 2).

           if($message) { 
              $add = $messageManager->add(
                [
                    "contenuDeMessage" => $message,
                    "sujet_id" => $id,
                    "utilisateur_id" => 2
                    ]
              );
              //Une redirection est effectuée vers une autre page après l'ajout du message.
              //L'URL inclut des paramètres pour indiquer le contrôleur (forum), l'action
              //(listMessagesBySujet), et l'identifiant du sujet ($id).
              header("Location: index.php?ctrl=forum&action=listMessagesBySujet&id=$id");
           }
        }
    }
    public function addSujetCategory($id){
        $sujetManager = new SujetManager();
       
        if(isset($_POST["submit"])){
             
            $titreSujet = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($titreSujet){
                
                $add = $sujetManager->add(
                    [
                         "titreDeSujet"=>$titreSujet,
                          "utilisateur_id"=> 2,
                          "categorie_id"=> $id                   
                    ]
                );
                header("Location:index.php?ctrl=forum&action=listTopicsByCategory&id=$id");
            }
        }
    }
}