<?php

namespace ESPRITPIDEV\UserExpBundle\Controller;

use ESPRITPIDEV\UserExpBundle\Entity\Complaints;
use ESPRITPIDEV\UserExpBundle\Entity\Notification;
use ESPRITPIDEV\UserExpBundle\Entity\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ESPRITPIDEV\UserExpBundle\Form\ResponseType;
use Swift_Message;
use ESPRITPIDEV\UserExpBundle\Entity\Mail;

/**
 * Response controller.
 *
 */
class ResponseController extends Controller
{
    /**
     * Lists all response entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $responses = $em->getRepository('ESPRITPIDEVUserExpBundle:Response')->findAll();

        return $this->render('response/index.html.twig', array(
            'responses' => $responses,
        ));
    }

    /**
     * Creates a new response entity.
     *
     */
    public function newAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $complaint = $em->getRepository("ESPRITPIDEVUserExpBundle:Complaints")->find($id);
        $query = $this->getDoctrine()->getEntityManager()->createQuery
        ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
             where v.idcomplaint=:id order by v.datetime asc")
            ->setParameter('id', $id);
        $query->setMaxResults(20);
        $responses=$query->getResult();
        $response= new Response();
        $response->setIdcomplaint($complaint);
        $response->setType(true);
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush($response);

            $notification= new Notification("A new response!", "Response Add", "Unseen",$complaint->getIduser() );
            $em->persist($notification);
            $em->flush();

            $mail = new Mail();
            $mail->setEmail('wajd.meskini@esprit.tn');
            $mail->setNom($complaint->getIduser()->getUsername());
            $mail->setPrenom($complaint->getIduser()->getUsername());
            $mail->setText("Greetings \n You have received a new response for your complaint with topic\n ".$complaint->getType()." dated ".$complaint->getDatetime()->format('Y-m-d H:i:s')
            ." <a href='localhost/piv1/web/app_dev.php/user/".$complaint->getId()."/showuser'>Display</a>");
            $message = \Swift_Message::newInstance()
                ->setSubject('New response')
                ->setFrom('atracordis5@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'ESPRITPIDEVUserExpBundle:Default:emailSuccess.html.twig',
                        array('nom' => $mail->getNom(), 'prenom' => $mail->getPrenom(), 'content'=>$mail->getText())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }

        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('response/show.html.twig', array(
            'pagination' => $pagination, 'complaint' => $complaint,
            'form' => $form->createView(),
        ));
    }
    public function newuserAction(Request $request, $id)
{
    $em = $this->getDoctrine()->getManager();
    $complaint = $em->getRepository("ESPRITPIDEVUserExpBundle:Complaints")->find($id);
    $query = $this->getDoctrine()->getEntityManager()->createQuery
    ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
             where v.idcomplaint=:id order by v.datetime asc")
        ->setParameter('id', $id);
    $query->setMaxResults(20);
    $responses=$query->getResult();
    $response= new Response();
    $response->setIdcomplaint($complaint);
    $response->setType(false);
    $form = $this->createForm(ResponseType::class, $response);
    $form->handleRequest($request);

    if ($form->isSubmitted() ) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($response);
        $em->flush($response);
        $complaint->setStatus("Pending");
        $em->persist($complaint);
        $em->flush($complaint);

        return $this->redirectToRoute('complaints_user_answer', array('id' => $response->getIdcomplaint()->getId()));
    }

    $paginator=$this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        10/*limit per page*/
    );
    return $this->render('response/showResponseUser.html.twig', array(
        'pagination' => $pagination, 'complaint' => $complaint,
        'form' => $form->createView(),
    ));
}
    public function newbackupAction(Request $request, $id)
    {
        $response = new Response();
        $em = $this->getDoctrine()->getManager();

        $complaint = $em->getRepository("ESPRITPIDEVUserExpBundle:Complaints")->find($id);
        $responsefun=$this->getDoctrine()->getEntityManager()->createQuery("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
             where v.idcomplaint=:id  order by v.datetime asc")->setParameter('id',$id);

        $response->setIdcomplaint($complaint);
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);
        $response->setType(true);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush($response);

            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }

        return $this->render('response/new.html.twig', array(
            'response' => $response,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a response entity.
     *
     */
    public function showAlAction(Response $response)
    {
        $deleteForm = $this->createDeleteForm($response);
        $complaint = new Complaints();
        $complaint=$response->getIdcomplaint();
        $complaint->setStatus("Seen");
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);

        return $this->render('response/show.html.twig', array(
            'response' => $response,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function showAction(Request $request, Response $response)
    {

        $query = $this->getDoctrine()->getEntityManager()->createQuery
        ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
             where v.idcomplaint=:id  order by v.datetime asc")
            ->setParameter('id', $response->getIdcomplaint()->getId());


        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );


        $complaint = new Complaints();
        $complaint=$response->getIdcomplaint();
        $complaint->setStatus("Seen");
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);
        $response= new Response();
        $response->setIdcomplaint($complaint);
        $response->setType(true);
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush($response);

            $notification= new Notification("A new response!", "Response Add", "Unseen",$complaint->getIduser() );
            $em->persist($notification);
            $em->flush();

            $mail = new Mail();
            $mail->setEmail('wajd.meskini@esprit.tn');
            $mail->setNom($complaint->getIduser()->getUsername());
            $mail->setPrenom($complaint->getIduser()->getUsername());
            $mail->setText("Greetings \n You have received a new response for your complaint with topic\n ".$complaint->getType()." dated ".$complaint->getDatetime()->format('Y-m-d H:i:s'));
            $message = \Swift_Message::newInstance()
                ->setSubject('New response')
                ->setFrom('atracordis5@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'ESPRITPIDEVUserExpBundle:Default:emailSuccess.html.twig',
                        array('nom' => $mail->getNom(), 'content'=>$mail->getText())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }

        return $this->render('response/show.html.twig', array(
            'pagination' => $pagination, 'complaint' => $complaint,
            'form' => $form->createView(),
        ));
    }
    public function showbackupAction(Request $request, Response $response)
    {

        $query = $this->getDoctrine()->getEntityManager()->createQuery
        ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
             where v.idcomplaint=:id  order by v.datetime asc")
            ->setParameter('id', $response->getIdcomplaint()->getId());
        $query->setMaxResults(20);
        $responses=$query->getResult();
        $complaint = new Complaints();
        $complaint=$response->getIdcomplaint();
        $complaint->setStatus("Seen");
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);
        $response= new Response();
        $response->setIdcomplaint($complaint);
        $response->setType(true);
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush($response);

            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }

        return $this->render('response/show.html.twig', array(
            'responses' => $responses, 'complaint' => $complaint,
            'form' => $form->createView(),
        ));
    }

    public function testPaginationAction(Request $request)
    {

        $query = $this->getDoctrine()->getEntityManager()->createQuery
        ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
            order by v.datetime asc");
        $response= new Response();
        $complaint = new Complaints();
        $complaint->setId(1);
        $response->setIdcomplaint($complaint);
        $response->setType(true);
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush($response);

            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );



        // parameters to template
        return $this->render('response/paginationTest.html.twig', array('pagination' => $pagination, 'form' => $form->createView()));


    }
    public function testPaginationbackupAction(Request $request)
    {

        $query = $this->getDoctrine()->getEntityManager()->createQuery
        ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
            order by v.datetime asc");

        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render('response/paginationTest.html.twig', array('pagination' => $pagination));


    }

    public function showUserAction(Request $request, Response $response)
    {

        $query = $this->getDoctrine()->getEntityManager()->createQuery
        ("SELECT v FROM ESPRITPIDEVUserExpBundle:Response v 
             where v.idcomplaint=:id  order by v.datetime asc")
            ->setParameter('id', $response->getIdcomplaint()->getId());
        $query->setMaxResults(20);
        $responses=$query->getResult();
        $complaint = new Complaints();
        $complaint=$response->getIdcomplaint();
        $complaint->setStatus("Seen");
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);
        $response= new Response();
        $response->setIdcomplaint($complaint);
        $response->setType(false);
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush($response);

            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }

        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('response/show.html.twig', array(
            'pagination' => $pagination, 'complaint' => $complaint,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing response entity.
     *
     */
    public function editAction(Request $request, Response $response)
    {
        $deleteForm = $this->createDeleteForm($response);
        $editForm = $this->createForm('ESPRITPIDEV\UserExpBundle\Form\ResponseType', $response);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('response_edit', array('id' => $response->getId()));
        }

        return $this->render('response/edit.html.twig', array(
            'response' => $response,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a response entity.
     *
     */
    public function deleteAction(Request $request, Response $response)
    {
        $form = $this->createDeleteForm($response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($response);
            $em->flush($response);
        }

        return $this->redirectToRoute('response_index');
    }

    /**
     * Creates a form to delete a response entity.
     *
     * @param Response $response The response entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Response $response)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('response_delete', array('id' => $response->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
