<?php



ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once ('../vendor/autoload.php');



session_start();


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

password_hash('superSecurePassword', PASSWORD_DEFAULT);


use Illuminate\Database\Capsule\Manager as Capsule; 


use Aura\Router\RouterContainer;

use Zend\Diactoros\Response\RedirectResponse;




$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();

$map = $routerContainer-> getMap();

$map->get('index', '/', [
    'controller' => 'App\Controllers\indexController',
    'action' => 'indexAction',
    'auth' => true,

]);






$map->get('addJob', '/jobs/add', [
    'controller' => 'App\Controllers\jobsController',
    'action' => 'getAddJobAction',
    'auth' => true,

]);
$map->get('addProject', '/projects/add', [
    'controller' => 'App\Controllers\projectsController',
    'action' => 'getAddProjectAction',
    'auth' => true,

]);




$map->post('saveJob', '/jobs/add', [
    'controller' => 'App\Controllers\jobsController',
    'action' => 'getAddJobAction'
]);
$map->post('saveProject', '/projects/add/', [
    'controller' => 'App\Controllers\projectsController', 
    'action' => 'getAddProjectAction'
]);





$map->get('addUser', '/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction',

]);

$map->post('saveUser', '/login', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'postSaveUser'

]);






$map->get('loginForm', '/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin',
]);


$map->post('auth', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin',
]);





$map->get('admin', '/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true,
]);




$map->get('logOut', '/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogOut',
]);




$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


function printElement( $job) {
    // if($job->visible == false) {
    //   return;
    // }
  
    echo '<li class="work-position">';
    echo '<h5>' . $job-> title . '</h5>';
    echo '<p>' . $job-> description . '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }

  if (!$route) {
    echo 'No route';
} else {
    $handlerData = $route-> handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        echo 'Protected route';
        die;
    }

    $controller = new $controllerName;
    $response = $controller->$actionName ($request) ;

    foreach($response-> getHeaders() as $name => $values)
    {
        foreach($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response-> getBody();
}

// $route = $_GET['route'] ?? '/';

// if($route == '/') {
    
//     require ('../index.php');

// }elseif($route == 'addJob'){

//     require ('../addJob.php');

// }elseif ($route == 'addProject') {

//     require ('../addProject.php');
// }

//EL METODO DE ARRIBA ES CON DIACTOROS
