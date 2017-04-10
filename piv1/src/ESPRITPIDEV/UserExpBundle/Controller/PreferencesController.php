<?php

namespace ESPRITPIDEV\UserExpBundle\Controller;

use ESPRITPIDEV\UserExpBundle\Entity\Preferences;
use ESPRITPIDEV\UserExpBundle\Form\PreferencesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Preference controller.
 *
 */
class PreferencesController extends Controller
{
    /**
     * Lists all preference entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $preferences = $em->getRepository('ESPRITPIDEVUserExpBundle:Preferences')->findAll();

        return $this->render('preferences/index.html.twig', array(
            'preferences' => $preferences,
        ));
    }

    /**
     * Creates a new preference entity.
     *
     */
    public function newAction(Request $request)
    {
        $preference = new Preferences();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("ESPRITPIDEVUserExpBundle:User")->find(3);
        $preference->setIduser($user);
        $form = $this->createForm(PreferencesType::class, $preference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($preference);
            $em->flush($preference);

            return $this->redirectToRoute('preferences_show', array('id' => $preference->getIduser()->getId()));
        }

        return $this->render('preferences/new.html.twig', array(
            'preference' => $preference,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a preference entity.
     *
     */
    public function showAction(Preferences $preference)
    {
        $deleteForm = $this->createDeleteForm($preference);

        return $this->render('preferences/show.html.twig', array(
            'preference' => $preference,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing preference entity.
     *
     */
    public function editAction(Request $request, Preferences $preference)
    {
        $deleteForm = $this->createDeleteForm($preference);
        $editForm = $this->createForm(PreferencesType::class, $preference);
        $editForm->handleRequest($request);
        $user = $this->getUser()->getId();
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('preferences_edit', array('id' => $preference->getIduser()->getId()));
        }


        return $this->render('preferences/edit.html.twig', array(
            'preference' => $preference,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a preference entity.
     *
     */
    public function deleteAction(Request $request, Preferences $preference)
    {
        $form = $this->createDeleteForm($preference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($preference);
            $em->flush($preference);
        }

        return $this->redirectToRoute('preferences_index');
    }

    /**
     * Creates a form to delete a preference entity.
     *
     * @param Preferences $preference The preference entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Preferences $preference)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('preferences_delete', array('id' => $preference->getIduser()->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
