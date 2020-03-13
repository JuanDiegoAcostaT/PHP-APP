<?php

namespace App\Controllers;

use App\models\Project;

use Respect\Validation\Validator as v;

//EL as v ES PARA USAR EL CODIGO SOLO CON ESA V Y PODER LLAMAR AL VALIDATOR SOLO CON UN CARARCTER, OSEA, MAS SENCILLO QUE LLAMAR TODA LA LINEA, ES MAS AMIGABLE PARA EL CODIGO


class ProjectsController extends BaseController {
    public function getAddProjectAction ($request){
        $responseMessage = null;

        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $projectValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());

            try {
                $projectValidator->assert($postData);
                $postData = $request->getParsedBody();

                $files = $request-> getUploadedFiles();
                $logo = $files['logo'];


                if($logo-> getError() == UPLOAD_ERR_OK){

                    $fileName = $logo-> getClientFilename();
                    $logo-> moveTo("Uploads/$fileName");

                }


                $project = new Project();
                $project->title = $postData['title'];
                $project->description = $postData['description'];
                $project->logoName = $fileName;
                $project->save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }

        return $this->renderHTML('addProject.twig', [
            'responseMessage' =>$responseMessage
        ]);
    }
}
