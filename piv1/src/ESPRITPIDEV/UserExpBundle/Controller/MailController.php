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
        $query  = $this->getDoctrine()->getEntityManager()
            ->createQuery
            ("SELECT k.email as emailuser, k.username as nameuser, k.enabled, k.roles, v.newsletter
              FROM ESPRITPIDEVUserExpBundle:Preferences v join v.iduser k
              WHERE k.roles='a:1:{i:0;s:11:\"ROLE_CLIENT\";}' and k.enabled=1 and v.newsletter=1");
        $counted=$query->getResult();
        $query2  = $this->getDoctrine()->getEntityManager()
            ->createQuery
            ("SELECT count(k.email) as counted
              FROM ESPRITPIDEVUserExpBundle:Preferences v join v.iduser k
              WHERE k.roles='a:1:{i:0;s:11:\"ROLE_CLIENT\";}' and k.enabled=1 and v.newsletter=1");
        $countarray=$query2->getSingleResult();
        $countyes=$countarray['counted'];

        $mail = new Mail();
        $mail->setNom("");
        $mail->setPrenom("");
        $mail->setTel(0);
        $mail->setEmail("");
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);
        if ($form->isValid()) {

            foreach($counted as &$v) {
                $mail->setEmail($v['emailuser']);
                $mail->setNom($v['nameuser']);
                $mail->setPrenom($v['nameuser']);

                $message = \Swift_Message::newInstance()
                    ->setSubject('Chaya3ni Newsletter')
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
            }
            return $this->redirect($this->generateUrl('complaints_mail_success'));

        }
        return $this->render('ESPRITPIDEVUserExpBundle:Default:emailForm.html.twig', array('count'=>$countyes,'form'=>$form
            ->createView()));
    }
    public function successAction()
    {
        $this->addFlash('success', 'Newsletter <a href="/" class="alert-link"> sent successfully!</a>');
        return $this->redirect($this->generateUrl('complaints_mail_homepage'));
    }
}