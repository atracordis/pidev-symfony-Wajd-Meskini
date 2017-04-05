<?php

namespace Chaya3niUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Chaya3niUserBundle:Default:index.html.twig');
    }
    public function userpageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexuser.html.twig');
    }

    public function employeepageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexemployee.html.twig');
    }

    public function adminpageAction()
    {
         return $this->render('Chaya3niUserBundle:Default:indexadmin.html.twig');
    }
    public function representantpageAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexrepresentant.html.twig');
    }
    public function dachatyesAction()
    {
        return $this->render('Chaya3niUserBundle:Default:Chat.html.twig');
    }
    public function logoutAction()
    {
        return $this->render('Chaya3niUserBundle:Default:indexrepresentant.html.twig');
    }
}
