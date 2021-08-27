<?php

require "models/VilleManager.class.php";

class VilleController
{
    private $userManager;
    public function __construct()
    {
        $this->userManager = new VillesManager();
        // on demande au manager de charger tous les utilisateurs depuis la base de données
        $this->userManager->loadAllVilles();
        
    }

    /** fontion appelée par la route /allusers */
    public function display_all_users()
    {
        // on récupère le tableau des utilisateurs dans une variable $users
        $villes = $this->userManager->getAllVilles() ;
        // et on charge la vue qui utilisera $users
        require_once "views/villes.php";
    }
	
	/** fontion appelée par la route /user/(:number) */
    // public function display_ville($codepostal)
    // {
    //     // on récupère l'utilisateur depuis le manager
    //     $ville = $this->userManager->loadVille($codepostal) ;
    //     var_dump($this->userManager);
    //     // et on charge la vue qui utilisera $ville
    //     require_once "views/ville.php";
    // }

    
    public function RetrouverVilleSelonCp($codepostal)
    {
        //connexion a la base de données.
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=mvc", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          }
          catch(PDOException $e) {
            echo "Erreur: ". $e->getMessage();
        }

        // $ville = $this->userManager->getAllVilles() ;
        
        if (!empty($codepostal)){
            $villearetourner = $bdd->prepare('SELECT * FROM villes_france WHERE code_postal LIKE "%'.$codepostal.'%"');
            $villearetourner->execute();
            $red = $villearetourner->fetchAll();
            
            $new_ville = new Ville (
                $red[0]['id'],
                $red[0]['departement'],
                $red[0]['nom'],
                $red[0]['code_postal'],
                $red[0]['canton'],
                $red[0]['population'],
                $red[0]['densite'],
                $red[0]['surface']
            );
            $this->userManager->addVille($new_ville);
            

        }else{
            echo "il manque le code postal" ;
        }
        // et on charge la vue qui utilisera $ville
        require_once "views/ville.php";
    }

    public function MettreAJourUneVille($codepostal, $update , $colonneachanger , $newvaleur){
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=mvc", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          }
          catch(PDOException $e) {
            echo "Erreur: ". $e->getMessage();
        }


        if(!empty($codepostal)){
            if(!empty($update) AND $update === "update"){
                if(!empty($colonneachanger) AND $colonneachanger === "canton" OR $colonneachanger === "population" OR $colonneachanger ==="densite" OR $colonneachanger ==="surface"){
                    if(!empty($newvaleur) AND !is_nan($newvaleur)){
                        $updatecanton = $bdd->prepare('UPDATE villes_france SET '.$colonneachanger.' = "'.$newvaleur.'" WHERE code_postal = "'.$codepostal.'" ') ;
                        $updatecanton->execute();
                        echo " La valeur de la colonne ".$colonneachanger." a bien été modifié" ;
                    }else { echo "vous devez renseigner un nombre comme valeur" ; }
                }else{ echo "Verifier l'orthographe des données que vous souhaitez changer ( Choix possible : 'canton' , 'population' , 'densite' , 'surface' " ; }
            }else{  echo "update n'est pas bien ecris" ; }
        }else{ echo "il manque le code postal" ; }

        require_once "views/villeajour.php";
    }

}

