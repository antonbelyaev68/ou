<?php
namespace Application\DashboardBundle\Actions;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostCarColor extends Admin {
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('name', 'text', array('label' => 'Название'))
        ;
        #name, type, array(template, targetEntity, options)
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('name')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('name')
        ;
    }
}

#    list: The fields displayed in the list table
#    filter: The fields available for filtering the list
#    form: The fields used to create/edit the entity
#    show: The fields used to show the entity
#    Batch actions: Actions that can be performed on a group of entities (e.g. bulk delete)

#automatically injected by the bundle:
#    ListBuilder: builds the list fields
#    FormContractor: builds the form using the Symfony FormBuilder
#    DatagridBuilder: builds the filter fields
#    Router: generates the different urls
#    Request
#    ModelManager: Service which handles specific ORM code
#    Translator

