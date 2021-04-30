<?php

class Aquatique extends Animaux {

    protected string $espece; 
    protected bool $gestation; 
    protected string $tempsGestation;
    protected string $deplacement;



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
    public function getEspece(){
        return $this->espece;
    }
    public function getGestation(){
        return $this->gestation;
    }
    public function getTempsGestation(){
        return $this->tempsGestation;
    }
    public function getDeplacement(){
        return $this->deplacement;
    }

/* SET */

    public function setEspece(string $espece){
        $this->espece=$espece; 
    }
    public function setGestation(bool $gestation){
        $this->gestation=$gestation; 
    }
    public function setTempsGestation(string $tempsGestation){
        $this->tempsGestation=$tempsGestation; 
    }
    public function setDeplacement(string $deplacement){
        $this->deplacement=$deplacement; 
    }


/* METHODE */


}
