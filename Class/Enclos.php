<?php

class Enclos {

    protected string $superficie; 
    protected string $hauteur; 
    protected array $proprete=["bonne", "moyenne", "mauvaise"];
    protected string $etatPropreter = "bonne";
    protected bool $vide = true;
    protected int $nbAnimaux = 0;
    protected int $nbAnimauxMax = 5;
    protected array $animauxParquer = [];




    public function __construct(array $data)
    {
      $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
          $method = 'set'.ucfirst($key);

          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }
      }

    /* GET */
    public function getSuperficie(){
        return $this->superficie;
    }
    public function getHauteur(){
        return $this->hauteur;
    }
    public function getEtatProprete(){
        return $this->etatPropreter;
    }
    public function getNbAnimaux(){
        return $this->nbAnimaux;
    }
    public function getAnimauxParquer(){
        return $this->animauxParquer;
    }

    /* SET*/

    public function setSuperficie($superficie){
        $this->superficie=$superficie; 
    }
    public function setHauteur($hauteur){
        $this->hauteur=$hauteur; 
    }
    public function setProprete($proprete){
        $this->proprete=$proprete; 
    }


    /*METHODE */

    public function entretien(){
        if($this->vide === true){
            $this->etatProprete = $this->proprete[0];
        }else{
            echo "L'enclos n'est pas vide, impossible à nettoyer";
        }

    }
    public function changerDeEnclos(object $newEnclos, Animaux $animal){
        if(empty($newEnclos->animauxParquer)){
            $this->enleverLesAnimaux($animal);
            $newEnclos->ajouterAnimaux($animal);
            echo  $animal-> getNom() ." a bien été changer d'enclos.";
        }else if($this->nbAnimaux < $this->nbAnimauxMax){
            $this->enleverLesAnimaux($animal);
            $newEnclos->ajouterAnimaux($animal);
           
        }else{
            echo "L'enclos est déjà vide.";
        }
        
    }
    public function enleverLesAnimaux(Animaux $animal){

        if (!empty($this->animauxParquer)) {
            foreach ($this->animauxParquer as $key => $value) {
                if ($animal->getNom() == $value->getNom()) {
                    unset($this->animauxParquer[$key]);
                    $this->nbAnimaux--;
                    sort($this->animauxParquer, SORT_REGULAR);
                    
                    if($this->nbAnimaux === 0){
                        $this->vide = true;
                        $this->animauxParquer = [];
                    }
                }
            }
            $key =  array_search($animal, $this->animauxParquer);
        } 
    }

    public function ajouterAnimaux(object $animal){
        if($this->vide === true){
            array_push($this->animauxParquer, $animal);
            $this->nbAnimaux++;
            $this->vide = false;
        }else if($this->animauxParquer[0]->getEspece()!= $animal->getEspece()){
            echo "L'animal n'est pas de la même espèce que ceux présent dans cet enclos";
        }else if($this->nbAnimaux < $this->nbAnimauxMax){
            array_push($this->animauxParquer, $animal);
            $this->nbAnimaux++;
        }else{
            echo "Cet enclos est plein";
        }
    }

}