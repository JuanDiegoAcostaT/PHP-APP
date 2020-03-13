<?php
namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class UsersController extends BaseController {
    public function getAddUserAction() {
        return $this->renderHTML('addUser.twig');
    }

    public function postSaveUser($request) {
        $postData = $request->getParsedBody();

        // Validation here

        $user = new User();
        $user->email = $postData['email'];
        $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
        $user->save();
        return $this->renderHTML('login.twig');
    }
}