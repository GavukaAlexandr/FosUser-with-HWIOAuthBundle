<?php

namespace UserOverrideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserOverrideBundle:Default:index.html.twig');
    }
}
