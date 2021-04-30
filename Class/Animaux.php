<?php

abstract class Animaux {

    protected string $nom; 
    protected string $poid; 
    protected string $taille;
    protected int $age;
    protected string $sexe;
    protected bool $faim;
    protected bool $dort;
    protected bool $malade;



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
    public function getPoid(){
        return $this->poid;
    }
    public function getTaille(){
        return $this->taille;
    }
    public function getAge(){
        return $this->age;
    }
    public function getSexe(){
        return $this->sexe;
    }
    public function getFaim(){
        return $this->faim;
    }
    public function getDort(){
        return $this->dort;
    }
    public function getMalade(){
        return $this->malade;
    }
    
    /****************SET*******************/

    public function setNom(string $nom){
        $this->nom=$nom; 
    }
    public function setPoid(string $poid){
        $this->poid=$poid; 
    }
    public function setTaille($taille){
        $this->taille=$taille; 
    }
    public function setAge(int $age){
        $this->age=$age; 
    }
    public function setSexe(string $sexe){
        $this->sexe=$sexe; 
    }
    public function setFaim(bool $faim){
        $this->faim=$faim; 
    }
    public function setDort(bool $dort){
        $this->dort=$dort; 
    }
    public function setMalade(bool $malade){
        $this->malade=$malade; 
    }

    /*METHOD*/

    public function manger(){
        if($this->faim === true){
            $this->faim = false; 
            echo "L'animal mange";
        }else{
            echo "L'animal n'as pas faim";
        }
    }

    public function reveiller(){
        if($this->dort=== true){
            $this->dort = false; 
            echo "L'animal ce réveille.";
        }else{
            echo "L'animal ne dort pas.";
        }
    } 

    public function soigner(){
        if($this->malade=== true){
            $this->malade = false; 
            echo "L'animal est soigné.";
        }else{
            echo "L'animal n'est pas malade'.";
        }
    }

    public function son(){
        echo $this->getNom() . " pousse un cri";
    }

    public function dormir(){
        if($this->dort=== false){
            $this->dort = true; 
            echo "L'animal s'endort.";
        }else{
            echo "L'animal dort déjà.";
        }
    }
}