<?php
class Ville extends Model
{
    public $id;
    public $departement;
    public $ville;
    public $code_postal;
    public $canton;
    public $population;
    public $densite;
    public $surface;


    public function __construct($id, $departement, $ville, $code_postal, $canton, $population, $densite, $surface)
    {
        $this->id = $id ;
        $this->departement = $departement ;
        $this->ville = $ville ;
        $this->code_postal = $code_postal ;
        $this->canton= $canton ; 
        $this->population = $population ;
        $this->densite = $densite ; 
        $this->surface = $surface ;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param mixed $departement
     */
    public function setDepartement($departement): void
    {
        $this->username = $departement;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCode_postal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCode_postal($code_postal): void
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return mixed
     */
    public function getCanton()
    {
        return $this->canton;
    }

    /**
     * @param mixed $canton
     */
    public function setCanton($canton): void
    {
        $this->canton = $canton;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population): void
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getDensite()
    {
        return $this->densite;
    }

    /**
     * @param mixed $densite
     */
    public function setDensite($densite): void
    {
        $this->densite = $densite;
    }

    /**
     * @return mixed
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @param mixed $surface
     */
    public function setSurface($surface): void
    {
        $this->surface = $surface;
    }

}
