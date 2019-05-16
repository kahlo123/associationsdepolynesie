<?php
class Office
{
    private $date_start ;
    private $date_end ;
    private $date_crea ;
    private $member ;

    public function __construct($post){
        $this->date_start = $post["date_start"] ;
        $this->date_end = $post["date_end"] ;
        $this->date_crea = $post["date_crea"] ;
        $this->member = $post["membre"] ;
    }

    public function insert(){
        global $wpdb ;
        $insert = $wpdb->insert(
            $wpdb->prefix."office",
            [
                "date_start" => $this->date_start ,
                "date_end" => $this->date_end ,
                "date_crea" => $this->date_crea ,
            ]
        );

        $query = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}office` order by id desc limit 1");

        foreach ($query as $row) {
            $last_id = $row->id ;
        }


        foreach ($this->member as $member) {
            $wpdb->insert(
                $wpdb->prefix."office_member",
                [
                    "office_id" => $last_id,
                    "firstname" => $member["firstname"],
                    "lastname" => $member["lastname"],
                    "tel" => $member["tel"],
                    "mail" => $member["mail"],
                    "dateOfBirth" => $member["dateOfBirth"],
                    "address" => $member["address"],
                    "situation" => $member["situation"],
                ]
            );
        }

        return $this->member ;


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

        return array("code" => $code, "content" => $resp, "last_id" => $last_id);
    }


    /**
     * Getter // Setter
     */
    public function get_date_start(){
        return $this->date_start ;
    }

    public function get_date_end(){
        return $this->date_end ;
    }

    public function get_date_crea(){
        return $this->date_crea ;
    }
}