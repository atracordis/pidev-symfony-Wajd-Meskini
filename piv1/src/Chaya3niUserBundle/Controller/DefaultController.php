<?php

namespace Chaya3niUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }
    public function userpageAction()
    {
        return $this->render('index.html.twig');
    }

    public function employeepageAction()
    {
        return $this->render('index.html.twig');
    }

    public function adminpageAction()
    {
        return $this->redirectToRoute('no_new');
    }
    public function representantpageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:index.html.twig');
    }
    public function dachatyesAction()
    {
        return $this->render('index.html.twig');
    }
    public function logoutAction()
    {
        return $this->render('Chaya3niUserBundle:Default:index.html.twig');
    }
    public function accessAction()
    {
        return $this->render('access.html.twig');
    }
}
