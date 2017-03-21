<?php
// AcmeBundle\Security\LoginSuccessHandler.php

namespace Chaya3niUserBundle\Redirection;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    protected $router;
    protected $authorizationChecker;

    public function __construct(Router $router, AuthorizationChecker $authorizationChecker)
    {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {

        $response = null;

        if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            $response = new RedirectResponse($this->router->generate('chaya3ni_homepageadmin'));
        }else if ($this->authorizationChecker->isGranted('ROLE_EMPLOYEE')) {
            $response = new RedirectResponse($this->router->generate('chaya3ni_homepageemployee'));
        }else if ($this->authorizationChecker->isGranted('ROLE_CLIENT')) {
            $response = new RedirectResponse($this->router->generate('chaya3ni_homepageuser'));
        }else if ($this->authorizationChecker->isGranted('ROLE_REPRESENTANT')) {
            $response = new RedirectResponse($this->router->generate('chaya3ni_homepagerepresentant'));
        }
        return $response;
    }
}