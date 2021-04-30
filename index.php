<?php
require("Class/Autoloader.php");
Autoloader::register();
include("partials/sql_connect.php");
include("partials/header.php");



$toto = new Felins(["espece"=> "tigre" , "nom" => "TOTO", "age"=> 3, "dort" => false, "faim" => false, "deplacement" => "vagabonde", "malade" => false , "sexe" => "male", "gestation" => false, "poid" => "23kg", "taille" => "1m54"]);
$tata = new Felins(["espece"=> "tigre" , "nom" => "TATA", "age"=> 3, "dort" => false, "faim" => false, "deplacement" => "vagabonde", "malade" => false , "sexe" => "male", "gestation" => false, "poid" => "23kg", "taille" => "1m54"]);
$titi = new Felins(["espece"=> "tigre" , "nom" => "TITI", "age"=> 3, "dort" => false, "faim" => false, "deplacement" => "vagabonde", "malade" => false , "sexe" => "male", "gestation" => false, "poid" => "23kg", "taille" => "1m54"]);
$tigrou = new Felins(["espece"=> "tigre" , "nom" => "Tigrou", "age"=> 3, "dort" => false, "faim" => false, "deplacement" => "vagabonde", "malade" => false , "sexe" => "male", "gestation" => false, "poid" => "23kg", "taille" => "1m54"]);

$encloTigre = new EnclosMammifere(["superficie" => "1200mC", "hauteur" => "10 mètres", "type" => $toto->getEspece()]);
$encloLion = new EnclosMammifere(["superficie" => "1200mC", "hauteur" => "10 mètres", "type" => $toto->getEspece()]);

$encloTigre->ajouterAnimaux($tigrou);
$encloTigre->ajouterAnimaux($tata);
$encloTigre->ajouterAnimaux($toto);
$encloTigre->ajouterAnimaux($titi);


$encloTigre->changerDeEnclos($encloLion, $titi);
$encloTigre->changerDeEnclos($encloLion, $tata);
$encloTigre->changerDeEnclos($encloLion, $toto);
$encloTigre->entretien();
$encloTigre->changerDeEnclos($encloLion, $tigrou);

$encloTigre->entretien();

//var_dump("ENCLOS Lion APRES SWITCH",$encloLion);
//var_dump("ENCLOS tigre après", $encloTigre);
//var_dump($encloTigre);

/*function Gesta(int $gesta){
    
    if($gesta != 0){
        $seconde = 2;
        sleep($seconde);
        $gesta -= $seconde;
        var_dump("Temps de gestation restant", $gesta);
        echo '<br>';
        Gesta($gesta);
    }else{
        echo 'accouchement';
    }
}

Gesta(8);
*/

$gege = new Employer(["nom" => "Gege", "sexe" => "homme", "age" => 46]);


$encloLion->changerDeEnclos($encloTigre, $tigrou);
var_dump("ENCLOS TIGRE 1",$encloTigre); 
var_dump("ENCLOS LION1",$encloLion); 
$encloTigre->changerDeEnclos($encloLion, $tigrou);
var_dump("ENCLOS TIGRE2",$encloTigre); 
var_dump("ENCLOS LION2",$encloLion); 
$encloLion->changerDeEnclos($encloTigre, $tigrou);
$encloTigre->changerDeEnclos($encloLion, $tigrou);
var_dump("ENCLOS TIGRE3",$encloTigre); 
$encloLion->changerDeEnclos($encloTigre, $tigrou);
$encloLion->changerDeEnclos($encloTigre, $titi);

var_dump("GEGE OBSERVE LENCLOS",$gege->examinerEnclos($encloTigre));

$gege->nettoyerEnclos($encloTigre);
$encloTigre->changerDeEnclos($encloLion, $tigrou);

$gege->nettoyerEnclos($encloTigre);

$gege->affamerAnimaux($tigrou);
$gege->envoyerDormir($tigrou);
$gege->nourrirAnimaux($tigrou);
$gege->reveillerAnimaux($tigrou);
$gege->nourrirAnimaux($tigrou);

?>
<?php

include("partials/footer.php");