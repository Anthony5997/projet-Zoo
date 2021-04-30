<?php

class Zoo {

    protected string $nomZoo; 
    protected array $totalEnclos = [];
    protected array $totalAnimaux =[];
    protected array $totalEmploye =[];


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
    public function getNomZoo(){
        return $this->nomZoo;
    }
    public function getTotalEnclos(){
        return $this->totalEnclos;
    }
    public function getTotalAnimaux(){
        return $this->totalAnimaux;
    }
    public function getTotalEmploye(){
        return $this->totalEmploye;
    }


/* SET*/

    public function setNomZoo($nomZoo){
        $this->nomZoo = $nomZoo; 
    }
    public function setTotalEnclos($totalEnclos){
        $this->totalenclos = $totalEnclos; 
    }
    public function setTotalAnimaux($totalAnimaux){
        $this->totalAnimaux = $totalAnimaux; 
    }
    public function setTotalEmploye($totalEmploye){
        $this->totalEmploye = $totalEmploye; 
    }

/*METHODE */
    public function mettreAnimauxZoo(object $animal){
        array_push($this->totalAnimaux, $animal);
        echo 'Le zoo a un nouveau animal';
        }

    public function nouveauxEnclos(object $enclos){
        array_push($this->totalEnclos, $enclos);
        echo 'le zoo a un nouveau enclos';
        }

    public function mettreEmploye(object $employe){
        array_push($this->totalEmploye, $employe);
        echo 'le zoo a un nouveau employe';

        }




}