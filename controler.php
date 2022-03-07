<?php
include_once "./Database.php";

class controler{
    function  ajouterVol($user )
    {
        $sql= "INSERT INTO vol(date_depart,heure_depart,heure_arrivee,ref_pilote,ref_avion) VALUES (:date_depart,:heure_depart,:heure_arrivee,:ref_pilote,:ref_avion)";
        $db= config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute(
                [
                    'date_depart'=> $user->getDateDepart(),
                    'heure_depart' =>$user->getHeureDepart(),
                    'heure_arrivee' => $user->getHeureArrivee(),
                    'ref_pilote' =>$user->getRef_Pilote(),
                    'ref_avion' =>$user->getRef_Avion(),
                ]
            );
        }catch (Exception $e)  
        {
            die('Erreur:'.$e->getMessage());
        }
    }
    function recupererVol()
    {
        $sql="SELECT * FROM vol ";
        $db= config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }catch(Exception $vols){
            die('Erreur: '.$vols->getMessage());
        }
    }
}
