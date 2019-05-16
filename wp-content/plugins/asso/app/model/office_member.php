<?php

class Office_member
{
    private $id ;
    private $office_id ;
    private $lastname ;
    private $firstname ;
    private $tel ;
    private $mail ;
    private $dateOfBirth ;
    private $address ;
    private $situation ;

    public function __construct($query){
        $this->office_id = $query["office_id"] ;
        $this->lastname = $query["lastname"] ;
        $this->firstname = $query["firstname"] ;
        $this->tel = $query["tel"] ;
        $this->mail = $query["mail"] ;
        $this->dateOfBirth = $query["dateOfBirth"] ;
        $this->address = $query["address"] ;
        $this->situation = $query["situation"] ;
    }

    public function insert(){
        global $wpdb ;
        $insert = $wpdb->insert(
            $wpdb->prefix."office_member",
            [
                "office_id" => $this->office_id ,
                "lastname" => $this->lastname ,
                "firstname" => $this->firstname,
                "tel" => $this->tel,
                "mail" => $this->mail,
                "dateOfBirth" => $this->dateOfBirth ,
                "address" => $this->address ,
                "situation" => $this->situation ,
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

        return array("code" => $code, "content" => $resp);
    }

    public function getId(){
        return $this->id ;
    }

    public function getOfficeId(){
        return $this->office_id ;
    }

    public function getLastname(){
        return $this->lastname ;
    }

    public function getFirstname(){
        return $this->firstname ;
    }

    public function getTel(){
        return $this->tel ;
    }

    public function getMail(){
        return $this->mail ;
    }

    public function getAddress(){
        return $this->address ;
    }

    public function getDateOfBirth(){
        return $this->dateOfBirth ;
    }

    public function getSituation(){
        return $this->situation ;
    }
}