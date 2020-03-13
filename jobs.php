<?php
// require 'app/Models/Job.php';
// require 'app/Models/Project.php';
// require_once 'app/Models/Printable.php';

// require 'lib1/Project.php';

// SE QUITAN POR EL COMPOSER (LOS REQUIRES)


use App\models\{Job, Project};

// $job1 = new Job('PHP Developer', 'This is an awesome job!!!');
// $job1->months = 16;

// $job2 = new Job('Python Developer', 'This is an awesome job!!!');
// $job2->months = 24;

// $job3 = new Job('Devops', 'This is an awesome job!!!');
// $job3->months = 32;


$jobs = Job::all();
//ESTO DE ARRIBA ES PORQUE IMPLEMENTAMOS BASES DE DATOS Y POR ESO SE COMENTARON LOS $job1 $job2 $job3 y el arreglo de abajo


// $jobs = [
//     $job1,
//     $job2,
//     $job3
//   ];

$projects = Project::all();


// $project1 = new Project('Project 1', 'Description 1');


// $projects = [
//     $project1
// ];
  




