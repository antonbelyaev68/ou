<?php
namespace Application\DashboardBundle\Actions;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class PostUser extends Admin {
        protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->with('Основные', array('description' => 'Подсказка для группы'))
                #->add('image.name')
                #name, type, array(template, targetEntity, options)                
                ->add('login', 'text', array('label' => 'Логин', 'required' => false))
                ->add('password', 'text', array('label' => 'Пароль'))
                ->add('otdel', 'text', array('label' => 'Отел'))
                ->add('id_user_department', 'entity', array('class' => 'Application\DashboardBundle\Entity\Department', 'label' => 'Райотдел'))
                ->setHelps(array(
                    'login' => 'Подсказка для поля',
                ))
            ->end()
            ->with('Доступ')
                ->add('access', 'text', array('label' => 'Доступ'))
                ->add('role', 'entity', array('class' => 'Application\DashboardBundle\Entity\Role', 'multiple' => true, 'label' => 'Роли'))
            ->end()
        ;
    }    
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('login')
            ->add('otdel')
            ->add('id_user_department')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        #type - array, boolean, date, datetime, text, trans, string, decimal, currency, percent, choice, url
        $listMapper
            ->addIdentifier('login')
            ->add('otdel')
            ->add('id_user_department')
        ;
    }
}
