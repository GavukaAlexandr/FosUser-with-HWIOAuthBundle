<?php

namespace FosUserOverrideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FosUserOverrideBundle:Default:index.html.twig');
    }
}
