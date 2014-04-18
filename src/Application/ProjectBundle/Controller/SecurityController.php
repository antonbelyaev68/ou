<?php

namespace Application\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SecurityController extends Controller
{
    /**
    * @Route("/")
    * @Method({"GET", "POST"})
    */
    public function indexAction() {
        #return $this->render('FOSUserBundle:Security:login.html.twig');
        if (!$this->get('security.context')->isGranted('ROLE_USER')) { 
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        /*$request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('ProjectBundle:Security:login.html.twig',
            array(
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );*/
    }
}

/**
    * @Route("/", name="login")
    * @Method({"GET", "POST"})
    */