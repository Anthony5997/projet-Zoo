<?php

class EnclosMammifere extends Enclos {

    protected string $type; 




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

    /* GET **/
    public function getType(){
        return $this->type;
    }


/* SET*/

    public function setType(string $type){
        $this->type=$type; 
    }



/*METHODE */



}