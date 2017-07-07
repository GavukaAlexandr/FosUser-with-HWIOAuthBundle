<?php

namespace AppBundle\Controller;

use AppBundle\Form\FormUploadFilesType as Form;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    public function uploadAction(Request $request)
    {
        $form = $this->createForm(Form::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $folderName = $form['folder_name']->getData();
            $files = $form['upload_file']->getData();

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();

//                $fs = new Filesystem();
//                if (!$fs->exists($this->getParameter('app.uploads_music_dir') . "/$folderName")) {
//                    $fs->mkdir($folderName, 0777);

//                }

                if ($file->move(
                    $this->getParameter('app.uploads_music_dir') . "/$folderName",
                    $fileName)) {

                } else {
                    echo "<pre>" . var_dump('files not saved') . "</pre>";exit;
                }
            }
        }

        return $this->render(
            'AppBundle:Default:upload.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
