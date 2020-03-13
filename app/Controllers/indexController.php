<?php

namespace App\Controllers;

use App\models\{Job, Project};

class indexController extends BaseController {
    public function indexAction(){

        $jobs = Job::all();

        $projects = Project::all(); 


        $name = 'Juan Diego';
        $apellidos = 'Acosta Taborda';
        $limitMonths = 2000;


        return  $this-> renderHTML('index.twig', [
            'name' => $name,
            'apellidos' => $apellidos,
            'jobs' => $jobs,
            'projects' => $projects
        ]);

        
    }
}
