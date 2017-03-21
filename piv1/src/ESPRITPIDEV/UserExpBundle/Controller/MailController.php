<?php

namespace ESPRITPIDEV\UserExpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;
use ESPRITPIDEV\UserExpBundle\Entity\Mail;
use ESPRITPIDEV\UserExpBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Response;
class MailController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Mail();
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                    ->setSubject('Testing da mail man')
                    ->setFrom('atracordis5@gmail.com')
                    ->setTo($mail->getEmail())
                    ->setBody(
                        $this->renderView(
                            'ESPRITPIDEVUserExpBundle:Default:emailSuccess.html.twig',
                            array('nom' => $mail->getNom(), 'prenom' => $mail->getPrenom())
                        ),
                        'text/html'
                    );
                $this->get('mailer')->send($message);
                return $this->redirect($this->generateUrl('complaints_mail_success'));
        }
        return $this->render('ESPRITPIDEVUserExpBundle:Default:emailForm.html.twig', array('form'=>$form
            ->createView()));
    }
    public function successAction()
    {
        return new Response("Success.");
    }
}