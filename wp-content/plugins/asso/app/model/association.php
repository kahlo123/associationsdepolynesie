<?php

class Association{
    private $id_asso ;
    private $nom_asso ; 
    private $adresse ; 
    private $bp ;
    private $cp ;
    private $num_tahiti;
    private $type_asso ;
    private $date_crea ;
    private $statut ; 
    private $pc ;
    private $reg_int ;

    public function __construct($post){
        $this->nom_asso = $post["nom_asso"];
        $this->adresse = $post["adresse"];
        $this->bp = $post["bp"];
        $this->num_tahiti = $post["num_tahiti"];
        $this->type_asso = $post["type_asso"];
        $this->date_crea = $post["date_crea"];
        $this->statut = $post["statut"];
        $this->pc = $post["pc"];
        $this->reg_int = $post["reg_int"];
    }

    public function insert(){
        global $wpdb ;

        return $wpdb->insert(
            $wpdb->prefix . 'info_asso',
            [
                 "nom_asso" => $this->nom_asso, 
                 "adresse" => $this->adresse, 
                 "bp" => $this->bp,
                 "cp" => $this->cp,
                 "num_tahiti" => $this->num_tahiti,
                 "type_asso" => $this->type_asso,
                 "date_crea" => $this->date_crea,
                 "statut" => $this->statut, 
                 "pc" => $this->pc,
                 "reg_int" => $this->reg_int,
            ]
        );
    }
}