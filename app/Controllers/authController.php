<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\User;

use Respect\Validation\Validator as v;

use Zend\Diactoros\Response\RedirectResponse;


class AuthController extends BaseController {
    public function getLogin (){

        return $this-> renderHTML('login.twig');

    }

    public function postLogin($request){
        $postData = $request-> getParsedBody();
        $responseMessage = null;
    
            $user = User::where('email', $postData['email'])->first();

            if($user) {

                if(password_verify($postData['password'], $user-> password )){

                    $_SESSION['userId'] = $user-> id;
                    return new RedirectResponse('/admin');

                }else{
                    $responseMessage = 'Usuario y contraseña no coinciden';
                }


            } else{
                $responseMessage = 'Usuario y contraseña no coinciden';
            }


            return $this-> renderHTML('login.twig',[

                'responseMessage' => $responseMessage

            ] );

    }   

    public function getLogOut(){

        unset ($_SESSION['userId']);
        return new RedirectResponse('/login');
    }
 }
