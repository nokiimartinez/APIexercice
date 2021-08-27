<?php
require_once "Model.class.php";
require_once "Ville.class.php";

/*******
 * Class UsersManager
 * La classe UserSManager a pour vocation de gérer les objets Users que l'applictaion va créer et manipuler
 */
class VillesManager extends Model
{
    // on conserve les villes dans un tableau privé
    private $villes;


    /****
     * @param $ville
     * Ajout d'une ville au tableau $ville
     */
    public function addVille($ville)
    {
        $this->villes[$ville->getId()] = $ville;
    }

    //retourne un tableau
    public function getAllVilles()
    {
        return $this->villes;
    }

    // charge toutes les villes dans le manager
    public function loadAllVilles()
    {
        /** vous pouvez écrire les requêtes pour les différents managers de DB, ou bien vous focaliser sur celui de votre choix */
        if (DB_MANAGER == PDO) // version PDO
        {
            $req = $this->getDatabase()->prepare("SELECT * FROM villes_france ");
            $req->execute();
            $villes = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
        }
        else if (DB_MANAGER == MEDOO) // version MEDOO
        {
            $villes = $this->getDatabase()->select("villes_france", "*") ;
            // var_dump($villes);
        }

        // on a récupéré tous les utilisateurs, on les ajoute au manager de users
        foreach ($villes as $ville) {
            $new_ville = new Ville (
                $ville['id'],
                $ville['departement'],
                $ville['nom'],
                $ville['code_postal'],
                $ville['canton'],
                $ville['population'],
                $ville['densite'],
                $ville['surface']
            );
            $this->addVille($new_ville); 
        }

    }

	
	//charge une ville depuis son codepostal
    public function loadVille($codepostal)
    {

        if (empty($this->villes))
		{
			$ville = $this->getAllVilles();
		}
        else
        {   
            echo "je n'arrive pas a chargé les villes" ;
        }
		return $this->villes[$codepostal];
    }
  
}
