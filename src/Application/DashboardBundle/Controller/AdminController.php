<?php
namespace Application\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Controller\CoreController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends CoreController {
    
    /**
    * @Route("/admin/custompage", name="sonata_admin_custompage")
    */
    public function custompageAction(Request $request) {
        // здесь размещается код вашей страницы
        // ...

        return $this->render('DashboardBundle:Custom:custompage.html.twig', array(
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks')
        ));
    }

}