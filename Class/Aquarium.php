<?php

class EnclosAquatique extends Enclos {

    protected string $type; 
    protected string $profondeur; 
    protected bool $saliniteDeaux; 




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
    public function getType(){
        return $this->type;
    }
    public function getProfondeur(){
        return $this->profondeur;
    }
    public function getSaliniteDeaux(){
        return $this->saliniteDeaux;
    }


/* SET */

    public function setType(string $type){
        $this->type=$type; 
    }
    public function setProfondeur(string $profondeur){
        $this->profondeur=$profondeur; 
    }
    public function setSalinireDeaux(bool $saliniteDeaux){
        $this->saliniteDeaux = $saliniteDeaux; 
    }


/* METHODE */



}