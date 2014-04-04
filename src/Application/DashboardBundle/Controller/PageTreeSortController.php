<?php
namespace Application\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class PageTreeSortController extends Controller {
    
    /**
    * @Route("/admin/page_tree_up/{page_id}", name="page_tree_up", requirements={"page_id" = "\d+"})
    */
    public function upAction($page_id) {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('DashboardBundle:Category');
        $page = $repo->findOneById($page_id);
        if ($page->getParent()){
            $repo->moveUp($page);
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
    /**
    * @Route("/admin/page_tree_down/{page_id}", name="page_tree_down", requirements={"page_id" = "\d+"})
    */   
    public function downAction($page_id) {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('DashboardBundle:Category');
        $page = $repo->findOneById($page_id);
        if ($page->getParent()){
            $repo->moveDown($page);
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
# @Secure(roles="ROLE_SUPER_ADMIN")



