<?php
namespace Controller;

use App\AbstractController;
use App\Session;
use App\ControllerInterface;
use Model\Managers\UtilisateurManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        if(isset($_POST["submitSignUp"])){

            $email= filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
            $nickname = filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST,"confirmPassword",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // $password = filter_input(INPUT_POST,"password",FILTER_VALIDATE_REGEXP,array("options" => array("regexp" => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])[^\s]{12,}$/')));
        
        // si les filtres passent
        if ($email && $nickname && $password) {
                // var_dump("ok");die;
                $utilisateurManager = new UtilisateurManager();
                // si le mail n'existe pas
                if (!$utilisateurManager->findOneByEmail($email)) {
                    // si le pseudo n'existe pas
                    if (!$utilisateurManager->findOneByUser($nickname)) {
                        // si les 2 mots de passe concordent et que le mot de passe a une longueur minimale de 8 caractères
                        if (($password == $confirmPassword) and strlen($password) >= 8) {
                            // var_dump("ok");die;
                            // hashage du mot de passe
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                            // ajout en base de données
                            // $userManager->add(["email" => $email, "nickname" => $nickname, "password" => $passwordHash, "role" => json_encode(["ROLE_USER"])]);
                            $utilisateurManager->add(["email" => $email, "pseudo" => $nickname, "motDePasse" => $passwordHash ]);
                            $this->redirectTo("security", "login");
                        } else {
                            Session::addFlash("error", "Passwords do not match or password length is incorrect");
                        }
                    } else {
                        Session::addFlash("error", "This nickname is already taken");
                    }
                } else {
                    Session::addFlash("error", "This email already exists");
                }
            }

            $this->redirectTo("security", "index");
        }

        return ["view" => VIEW_DIR . "/security/register.php"];
    }


        
    
    public function login () {
        $utilisateurManager = new UtilisateurManager();

        if (isset($_POST['submitLogin'])) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // if (Session::getTokenCSRF() !== $_POST['csrfToken']) {
            //     $this->logout();
            // }

            // si les filtres passent
            if ($email && $password) {
                // retrouver le mot de passe de l'utlisateur correspondant au mail
                $dbPass = $utilisateurManager->retrievePassword($email);
                // si le mot de passe est retrouvé
                if ($dbPass) {
                    // récupération du mot de passe
                    $hash = $dbPass->getMotDepasse();
                    // retrouver l'utilisateur par son email
                    $utilisateur = $utilisateurManager->findOneByEmail($email);
                    // comparaison du hash de la base de données et le mot de passe renseigné
                    if (password_verify($password, $hash)) {
                            // placer l'utilisateur en Session
                            Session::setUser($utilisateur );
                            // message de confirmation de connexion
                            Session::addFlash("success", "Login successfully");
                            return [
                                "view" => VIEW_DIR . "home.php",
                                "data" => [
                                    "user" => $utilisateur
                                ]
                            ];
                        
                    } else {
                        Session::addFlash('error', "Invalid credentials");
                        $this->redirectTo("security", "index");
                    }
                } else {
                    Session::addFlash('error', "Invalid credentials");
                    $this->redirectTo("security", "login");
                }
            }
        }

        return ["view" => VIEW_DIR . "/security/login.php"];
    }
    public function logout () {
        $_SESSION[] = session_unset();
        Session::addFlash("success", "Logout !");
        $this->redirectTo("security", "index");
    }
    
}