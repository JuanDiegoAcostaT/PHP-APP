<?php

namespace App\models;

require_once ('BaseElement.php');


use  Illuminate\Database\Eloquent\Model;

class Job extends Model {

    // public $timestamps = false;

    protected $table = 'jobs';

    //ASI HEREDO EL CONSTRCUTOR DE LA FUNCION PADRE 

        // public function __construct($title, $description){
        //     $newTitle = 'Job : ' . $title;
        //     parent::__construct($newTitle, $description);
        // }

    //IMPORTANTE se puede acceder  a los datos del objeto de la manera explicita como arriba o se pueden llamr usando $this, mas sencillo

    public function getDurationAsString() {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
      
        return "Job Duration: $years years $extraMonths months";
    }


}