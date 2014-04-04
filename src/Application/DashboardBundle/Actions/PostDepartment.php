<?php
namespace Application\DashboardBundle\Actions;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostDepartment extends Admin {
    
    protected $maxPerPage = 100;
    protected $maxPageLinks = 100;

    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by'    => 'name'
    );
    
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('id_user_department', 'integer', array('label' => 'Код'))
            ->add('name', 'text', array('label' => 'Название'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('id_user_department')
            ->add('name')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id_user_department')
            ->add('name')
        ;
    }
}
