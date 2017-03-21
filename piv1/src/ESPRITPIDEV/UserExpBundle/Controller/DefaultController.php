<?php

namespace ESPRITPIDEV\UserExpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ESPRITPIDEVUserExpBundle:Default:index.html.twig');
    }
}
