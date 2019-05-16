<?php

class Association{
    private $id ;
    private $name ;
    private $address ;
    private $pb ;
    private $pc ;
    private $num_tahiti;
    private $asso_type ;
    private $date_crea ;
    private $file;

    public function __construct($post,$file){
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->pb = $post["pb"];
        $this->pc = $post["pc"];
        $this->num_tahiti = $post["num_tahiti"];
        $this->asso_type = $post["asso_type"];
        $this->date_crea = $post["date_crea"];
        $this->file = $file;
    }

    public function insert(){
        global $wpdb ;

        $insert = $wpdb->insert(
            $wpdb->prefix . 'info_asso',
            [
                 "name" => $this->name,
                 "address" => $this->address,
                 "pb" => $this->pb,
                 "pc" => $this->pc,
                 "num_tahiti" => $this->num_tahiti,
                 "asso_type" => $this->asso_type,
                 "date_crea" => $this->date_crea,
            ]
        );

        if($insert == true){
            $code = 200 ;
            $resp = "Vos informations ont bien été enregitré" ;
            $folder = new Folder($this->name , $this->file);
            $folder->save() ;

        }
        else
        {
            $code = 400 ;
            $resp = "Vos informations n'ont pas pu être enregitré. Veuillez rééssayer ou contact l'administrateur" ;
        }

        return ["code" => $code , "content" => $resp] ;
    }
}