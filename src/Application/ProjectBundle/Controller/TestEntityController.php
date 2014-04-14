<?php

namespace Application\ProjectBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Application\ProjectBundle\Entity\TestEntity;
use Application\ProjectBundle\Form\TestEntityType;

/**
 * TestEntity controller.
 *
 * @Route("/testentity")
 */
class TestEntityController extends Controller
{

    /**
     * Lists all TestEntity entities.
     *
     * @Route("/", name="testentity")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProjectBundle:TestEntity')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TestEntity entity.
     *
     * @Route("/", name="testentity_create")
     * @Method("POST")
     * @Template("ProjectBundle:TestEntity:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TestEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('testentity_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TestEntity entity.
    *
    * @param TestEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TestEntity $entity)
    {
        $form = $this->createForm(new TestEntityType(), $entity, array(
            'action' => $this->generateUrl('testentity_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TestEntity entity.
     *
     * @Route("/new", name="testentity_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TestEntity();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TestEntity entity.
     *
     * @Route("/{id}", name="testentity_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProjectBundle:TestEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TestEntity entity.
     *
     * @Route("/{id}/edit", name="testentity_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProjectBundle:TestEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TestEntity entity.
    *
    * @param TestEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TestEntity $entity)
    {
        $form = $this->createForm(new TestEntityType(), $entity, array(
            'action' => $this->generateUrl('testentity_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TestEntity entity.
     *
     * @Route("/{id}", name="testentity_update")
     * @Method("PUT")
     * @Template("ProjectBundle:TestEntity:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProjectBundle:TestEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('testentity_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TestEntity entity.
     *
     * @Route("/{id}", name="testentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProjectBundle:TestEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TestEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('testentity'));
    }

    /**
     * Creates a form to delete a TestEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('testentity_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
