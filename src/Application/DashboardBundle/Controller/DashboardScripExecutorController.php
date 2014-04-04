<?php
namespace Application\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

use Application\DashboardBundle\Entity\Physique;
use Application\DashboardBundle\Entity\SignPlace;
use Application\DashboardBundle\Entity\SignType;
use Application\DashboardBundle\Entity\SimilarTo;
use Application\DashboardBundle\Entity\Height;
use Application\DashboardBundle\Entity\Sex;
use Application\DashboardBundle\Entity\User;

class DashboardScripExecutorController extends Controller
{
    /**
     * @Route("/admin/exec")
     * @Template()
     */
    public function indexAction() {
        $em = $this->container->get('doctrine')->getManager();
        #$em = GetEntityManager();
        $user = new User();
        $user->setLogin('admin');
        $user->setOtdel('admin');
        $user->setAccess('1');
        $user->setIdUserDepartment($em->find('Application\DashboardBundle\Entity\Department', 11681100));
        $user->setSalt('');
 
        // шифрует и устанавливает пароль для пользователя,
        // эти настройки совпадают с конфигурационными файлами
        $encoder = new MessageDigestPasswordEncoder('md5', true, 1);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);

        $em->persist($user);
        $em->flush();
        #$em->clear();
        
        return new Response('complete');
    }
}