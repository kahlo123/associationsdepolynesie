<?php

class Folder
{
    private $name ;
    private $files ;


    public function __construct($name , $file){
     $this->name = $name ;
     $this->files = $file ;
    }

    public function save(){
        // Créé le dossier de l'association
        $mkdir = SAVE_DOC_PATH ."/". $this->name ;
        wp_mkdir_p($mkdir);

        foreach ($this->files as $file) {
                $dest = $mkdir . "/". $file["name"] ;
                move_uploaded_file($file["tmp_name"] , $dest);
        }
    }
}