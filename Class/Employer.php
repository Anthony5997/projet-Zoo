<?php

class Employer {

    protected string $nom; 
    protected int $age;
    protected string $sexe;



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

    /****************GET*******************/
  
    public function getNom(){
        return $this->nom;
    }

    public function getAge(){
        return $this->age;
    }
    public function getSexe(){
        return $this->sexe;
    }

    /****************SET*******************/

    public function setNom(string $nom){
        $this->nom=$nom; 
    }

    public function setAge(int $age){
        $this->age=$age; 
    }
    public function setSexe(string $sexe){
        $this->sexe=$sexe; 
    }

    /*METHOD*/

    public function examinerEnclos($enclos){
        $caracteristiqueEnclos = [];
        $listAnimauxEnclos = [];
        foreach($enclos->getAnimauxParquer() as $animauxInside){
            array_push($listAnimauxEnclos, $animauxInside);
        }
       array_push($caracteristiqueEnclos, ["superficie"=>$enclos->getSuperficie(), "hauteur"=>$enclos->getHauteur(), "Propreter actuelle"=>$enclos->getEtatProprete(), "Nombre d'animaux"=>$enclos->getNbAnimaux(), "Liste animaux"=>$listAnimauxEnclos]);
        return $caracteristiqueEnclos;
    }

    public function nettoyerEnclos(Enclos $enclos){
        $enclos->entretien();
        echo "Vous nettoyer l'enclos <br>";
    }

    public function nourrirAnimaux(Animaux $animal){
        if($animal->getDort() === true){
            echo $animal->getNom() . " dort, vous ne pouvez pas le nourrir. Réveiller le avant. <br>";
        }else if($animal->getFaim() === false){
            echo $animal->getNom() . " n'a pas faim, revenez plus tard pour le nourrir.<br>";
        }else{
            $animal->setFaim(false);
            echo $animal->getNom() . " a bien été nourrie.<br>";
        }
    }

    public function reveillerAnimaux(Animaux $animal){
        if($animal->getDort() === true){
            $animal->setDort(false);
            echo "Vous réveiller " . $animal->getNom() . "<br>";
        }else{
            echo $animal->getNom() . " est déjà réveiller. <br>";
        }
    }

    public function envoyerDormir(Animaux $animal){
        if($animal->getDort() === false){
            $animal->setDort(true);
            echo "Vous bercez " . $animal->getNom() ." jusqu'à ce qu'il s'endorme. <br>";
        }else{
            echo $animal->getNom() . " dors déjà. <br>";
        }

    }

    public function affamerAnimaux(Animaux $animal){
        $animal->setFaim(true);
        echo "Vous ne nourrisez pas ". $animal->getNom() . " depuis un moment, et il commence à avoir faim. <br>";

    }
}