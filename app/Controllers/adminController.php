<?php

namespace App\Controllers;

use App\models\{Job, Project};

class AdminController extends BaseController {
    public function getIndex(){

        return  $this-> renderHTML('admin.twig');
        
    }
}
