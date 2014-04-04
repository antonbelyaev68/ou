<?php
namespace Application\DashboardBundle\Actions;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class PostCategory extends Admin{

    protected $maxPerPage = 2500;
    protected $maxPageLinks = 2500;

    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by'    => 'lft'
    );
    
    protected function configureFormFields(FormMapper $form) {
        $subject = $this->getSubject();
        $id = $subject->getId();
        $form
            ->with('Общие')
                ->add('parent', null, array('label' => 'Родитель', 'required'=>true, 'query_builder' => function($er) use ($id) {
                                                $qb = $er->createQueryBuilder('p');
                                                if ($id) $qb->where('p.id <> :id')->setParameter('id', $id);
                                                $qb->orderBy('p.root, p.lft', 'ASC');
                                                return $qb;
                                            }
                    ))
                ->add('title', null, array('label' => 'Название', 'required'=>true))
                ->add('is_limited_access', 'checkbox', array('label' => 'Оганиченный доступ', 'required'=>false))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('up', null, array('template' => 'SonataAdminBundle:ListField:field_tree_up.html.twig', 'label'=>'up'))
            ->add('down', null, array('template' => 'SonataAdminBundle:ListField:field_tree_down.html.twig', 'label'=>'down'))
            ->addIdentifier('id', null, array('sortable'=>false, 'label'=>'id'))
            ->add('laveled_title', null, array('sortable'=>false, 'label'=>'Категория'))
            ->add('is_limited_access', 'boolean', array('sortable'=>false, 'label' => 'Оганиченный доступ'))
            ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array()
                    ), 'label'=> 'Действия'
                ));
    }
    
    public function createQuery($context = 'list') {
        $em = $this->modelManager->getEntityManager('Application\DashboardBundle\Entity\Category');
        $queryBuilder = $em
            ->createQueryBuilder('p')
            ->select('p')
            ->from('DashboardBundle:Category', 'p')
            ->where('p.parent IS NOT NULL');

        $query = new ProxyQuery($queryBuilder);
        return $query;
    }

    public function preRemove($object) {
        $em = $this->modelManager->getEntityManager($object);
        $repo = $em->getRepository("DashboardBundle:Category");
        $subtree = $repo->childrenHierarchy($object);
        foreach ($subtree AS $el){
            $menus = $em->getRepository('DashboardBundle:AdditionalMenu')->findBy(array('page'=> $el['id']));
            foreach ($menus AS $m){
                $em->remove($m);
            }
            $services = $em->getRepository('DashboardBundle:Service')->findBy(array('page'=> $el['id']));
            foreach ($services AS $s){
                $em->remove($s);
            }
            $em->flush();
        }
        $repo->verify();
        $repo->recover();
        $em->flush();
    }

    public function postPersist($object) {
        $em = $this->modelManager->getEntityManager($object);
        $repo = $em->getRepository("DashboardBundle:Category");
        $repo->verify();
        $repo->recover();
        $em->flush();
    }

    public function postUpdate($object) {
        $em = $this->modelManager->getEntityManager($object);
        $repo = $em->getRepository("DashboardBundle:Category");
        $repo->verify();
        $repo->recover();
        $em->flush();
    }

}