<?php

namespace ESPRITPIDEV\UserExpBundle\Controller;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use ESPRITPIDEV\UserExpBundle\Entity\Complaints;
use ESPRITPIDEV\UserExpBundle\Entity\Notification;
use ESPRITPIDEV\UserExpBundle\Entity\User;
use ESPRITPIDEV\UserExpBundle\Entity\Warning;
use ESPRITPIDEV\UserExpBundle\ESPRITPIDEVUserExpBundle;
use ESPRITPIDEV\UserExpBundle\Form\ComplaintsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ESPRITPIDEV\UserExpBundle\Repository\ComplaintsRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use DateTime;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Complaint controller.
 *
 */
class ComplaintsController extends Controller
{
    /**
     * Lists all complaint entities.
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $complaints = $em->getRepository('ESPRITPIDEVUserExpBundle:Complaints')->findBy(array('status'=>'Unseen'), array('datetime'=>'asc'), null,0);
        foreach($complaints as &$v) {
             $v->setId(utf8_encode($v->getId()));
            $v->setContent(utf8_encode($v->getContent()));
            $v->setType(utf8_encode($v->getType()));
            $v->setDatetime(utf8_encode( $v->getDatetime()->format('Y-m-d H:i:s')) );
            $v->setAttachment(utf8_encode($v->getAttachment()));
            $v->setStatus(utf8_encode($v->getStatus()));
        }
        foreach($complaints as &$v){
           $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getId();
           $link=$link.utf8_encode("/show'>Display</a>");
            $list[] = array('Id' => $v->getId(), 'Type' => $v->getType(), 'Datetime' => $v->getDatetime(),
                'Attachment' => $v->getAttachment(), 'Status' => $v->getStatus(),'Content' => $link, 'Username'=>$v->getIduser()->getUsername(), 'Useremail'=>$v->getIduser()->getEmail(),);
        }

        if (isset($list)) {

            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/indexcomplaints.json', 'w');
                fwrite($fp, json_encode($list));
              fclose($fp);
        }
        return $this->render('complaints/index.html.twig', array(
            'complaints' => $complaints,
        ));
    }

    /**
     * Creates a new complaint entity.
     *
     */
    public function newAction(Request $request)
    {
        $complaint = new Complaints();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("ESPRITPIDEVUserExpBundle:User")->find($this->getUser()->getId());
        $complaint->setIduser($user);
        $form = $this->createForm(ComplaintsType::class, $complaint);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {

            if ($complaint->getAttachment()!="" and $complaint->getAttachment()!=null)
            {
            $em = $this->getDoctrine()->getManager();
            $file = $complaint->getAttachment();
            $fileName = $this->get('app.brochure_uploader')->upload($file);
            $complaint->setAttachment($fileName);
            }
            if ($complaint->getAttachment()==null)
            {
                $complaint->setAttachment(" ");
            }
            $em->persist($complaint);
            $em->flush($complaint);

            $this->addFlash('success', 'Complaint <a href="/" class="alert-link">received successfully!</a>');

         return $this->redirectToRoute('complaints_success_show', array('id' => $complaint->getId()));
        }

        return $this->render('complaints/new.html.twig', array(
            'complaint' => $complaint,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a complaint entity.
     *
     */
    public function showAction(Complaints $complaint)
    {
        $deleteForm = $this->createDeleteForm($complaint);
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);

        return $this->render('complaints/show.html.twig', array(
            'complaint' => $complaint,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function showuserAction(Complaints $complaint)
    {
        $deleteForm = $this->createDeleteForm($complaint);
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);

        return $this->render('complaints/showuser.html.twig', array(
            'complaint' => $complaint,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function successShowAction(Complaints $complaint)
    {
        $deleteForm = $this->createDeleteForm($complaint);
        $em = $this->getDoctrine()->getManager();
        $em->persist($complaint);
        $em->flush($complaint);

        return $this->render('complaints/complaintAddingSuccess.html.twig', array(
            'complaint' => $complaint,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing complaint entity.
     *
     */
    public function editAction(Request $request, Complaints $complaint)
    {
        $deleteForm = $this->createDeleteForm($complaint);
        $editForm = $this->createForm(ComplaintsType::class, $complaint);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('complaints_edit', array('id' => $complaint->getId()));
        }

        return $this->render('complaints/edit.html.twig', array(
            'complaint' => $complaint,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function displayUsersAction()
    {
        $query  = $this->getDoctrine()->getEntityManager()
              ->createQuery
          ("SELECT v, k FROM ESPRITPIDEVUserExpBundle:Complaints v join v.iduser k
             where v.status='Unseen' GROUP BY k");
          $complaints=$query->getResult();

        foreach($complaints as &$v){
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getIduser()->getId();
            $link=$link.utf8_encode("/displaysingleusers'>Display</a>");

            $list[] = array('Username'=>$v->getIduser()->getUsername(), 'Useremail'=>$v->getIduser()->getEmail(),'Display'=>$link);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/userswithcomplaints.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/usersWithComplaints.html.twig', array(
            'complaints' => $complaints,
        ));
    }
    public function displayComplaintsPerUserAction($id)
    {
        $query = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT v FROM ESPRITPIDEVUserExpBundle:Complaints v 
             where v.iduser=:id and (v.status='Unseen' or v.status='Pending')  order by v.datetime desc")->setParameter('id', $id);
        $complaints=$query->getResult();
        foreach($complaints as &$v) {
            $v->setId(utf8_encode($v->getId()));
            $v->setContent(utf8_encode($v->getContent()));
            $v->setType(utf8_encode($v->getType()));
            $v->setDatetime(utf8_encode( $v->getDatetime()->format('Y-m-d H:i:s')) );
            $v->setAttachment(utf8_encode($v->getAttachment()));
            $v->setStatus(utf8_encode($v->getStatus()));
        }
        foreach($complaints as &$v){
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getId();
            $link=$link.utf8_encode("/show'>Display</a>");

            $list[] = array('Id' => $v->getId(), 'Type' => $v->getType(), 'Datetime' => $v->getDatetime(),
                'Attachment' => $v->getAttachment(), 'Status' => $v->getStatus(),'Content' => $link);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/usersingle.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/singleUsersComplaints.html.twig', array(
            'complaints' => $complaints,
        ));
    }
    public function displayMyComplaintsAction()
    {
        if ($this->getUser()!= null){

        $query = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT v FROM ESPRITPIDEVUserExpBundle:Complaints v 
             where v.iduser=:id  order by v.datetime desc, v.status asc")->setParameter('id', $this->getUser()->getId());
        $complaints=$query->getResult();
        $k=0;
        foreach($complaints as &$v) {
            $v->setId(utf8_encode($v->getId()));
            $v->setContent(utf8_encode($v->getContent()));
            $v->setType(utf8_encode($v->getType()));
            $v->setDatetime(utf8_encode( $v->getDatetime()->format('Y-m-d H:i:s')) );
            $v->setAttachment(utf8_encode($v->getAttachment()));
            $v->setStatus(utf8_encode($v->getStatus()));
        }
        foreach($complaints as &$v){
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/user/").$v->getId();
            $link=$link.utf8_encode("/showuser'>Display</a>");

            $list[] = array('Id' => $v->getId(), 'Type' => $v->getType(), 'Datetime' => $v->getDatetime(),
                'Attachment' => $v->getAttachment(), 'Status' => $v->getStatus(),'Content' => $link);
        }

        if (isset($list)) {
            if (!file_exists('bundles/ESPRITPIDEV/UserExpBundle/tables/'.$this->getUser()->getId())) {
                mkdir('bundles/ESPRITPIDEV/UserExpBundle/tables/'.$this->getUser()->getId(), 0777, true);
            }


            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/'.$this->getUser()->getId().'/mycomplaints.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        $query2 = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v) as counted FROM ESPRITPIDEVUserExpBundle:Notification v 
             where v.iduser=:id  and v.status='Unseen' and v.type='Response Add'")
            ->setParameter('id', $this->getUser()->getId());

        $queryupdate = $this->getDoctrine()->getEntityManager()->createQuery("
        UPDATE ESPRITPIDEVUserExpBundle:Notification v
        set v.status='Seen' where v.iduser=:id and v.type='Response Add'")
            ->setParameter('id', $this->getUser()->getId());

        $queryReject = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v) as counted FROM ESPRITPIDEVUserExpBundle:Notification v 
             where v.iduser=:id  and v.status='Unseen' and v.type='Complaint Delete'")
            ->setParameter('id', $this->getUser()->getId());

        $notifications=$query2->getScalarResult();
        $notificationReject=$queryReject->getScalarResult();
            $queryupdate->execute();

        $querywarning = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v.id) as counted FROM ESPRITPIDEVUserExpBundle:Warning v 
             where v.iduser=:id  and (DATE_DIFF( v.datetime, CURRENT_DATE())<90)")
            ->setParameter('id', $this->getUser()->getId());
        $warning=$querywarning->getSingleResult();
        $warningnumber=$warning['counted'];
        if ($warningnumber==1)
            $this->addFlash('warning', "You have <b> one warning. </b> Please behave!");
        if ($warningnumber==2)
            $this->addFlash('danger', "You have <b  class='alert-link'> two warnings. </b> One more and your account will be banned!");


        $k1="";
        foreach ($notificationReject as $not)
        {$k1= $not['counted'];}
        if ($k1!="0")
            $this->addFlash('warning', "You have <b  class='alert-link'>".$k1." rejected complaint.</b>");

        $k="";
        foreach ($notifications as $not)
        {$k= $not['counted'];}
        if ($k!="0")
            $this->addFlash('success', "You have <b class='alert-link'>".$k." new response(s).</b>");

        return $this->render('complaints/myComplaints.html.twig', array(
            'complaints' => true,
        ));}
        else {

            $url = $this->generateUrl('fos_user_registration_confirmed');
            $response = new RedirectResponse($url);
        return $response;}
    }
    public function displayAllUsersbackAction()
    {
        $query  = $this->getDoctrine()->getEntityManager()
            ->createQuery
            ("SELECT v, k FROM ESPRITPIDEVUserExpBundle:Preferences v join v.iduser k
             where k.roles !='a:1:{i:0;s:10:\"ROLE_ADMIN\";}'");
        $complaints=$query->getResult();

        foreach($complaints as &$v){
            //  $link=utf8_encode("<a href='/piv1/web/app_dev.php/userexp/complaints/").$v->getIduser()->getId();
            //      $link=$link.utf8_encode("/displaysingleusers'>Display</a>");
            $email="";
            $phone="";
            $address="";
            if ($v->getEmail()==true)
                $email=$v->getIduser()->getEmail();
            if ($v->getAddress()==true)
                $address=$v->getAddressVar();
            if ($v->getTelephone()==true)
                $phone=$v->getTelephoneVar();
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getIduser()->getId();
            $link=$link.utf8_encode("/warning'>Send warning</a>");

            $list[] = array(
                'Username'=>$v->getIduser()->getUsername(),
                'Useremail'=>$email,
                'Address'=>$address,
                'Telephone'=> $phone,'Warning'=>$link);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/allusers.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/allusers.html.twig', array(
            'complaints' => $complaints,
        ));
    }

    public function displayAllUsersAction()
    {
        $query  = $this->getDoctrine()->getEntityManager()
            ->createQuery
            ("SELECT v, k FROM ESPRITPIDEVUserExpBundle:Preferences v join v.iduser k
             where k.roles !='a:1:{i:0;s:10:\"ROLE_ADMIN\";}'");
        $complaints=$query->getResult();

        foreach($complaints as &$v){
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/message/").
                $v->getIduser()->getUsername().
                utf8_encode("/new'>Contact</a>");

            $email="Private";
            $phone="Private";
            $address="Private";
            if ($v->getEmail()==true)
                $email=$v->getIduser()->getEmail();
            if ($v->getAddress()==true)
                $address=$v->getAddressVar();
            if ($v->getTelephone()==true)
                $phone=$v->getTelephoneVar();
            $list[] = array('Username'=>$v->getIduser()->getUsername(),
                'Useremail'=>$email,
                'Address'=>$address,
                'Telephone'=> $phone,
                'Warning'=>$link);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/allusersnew.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/allusers.html.twig', array(
            'complaints' => $complaints,
        ));
    }

    public function displayAllUsersAdminAction()
    {
        $query  = $this->getDoctrine()->getEntityManager()
            ->createQuery
            ("SELECT v, k FROM ESPRITPIDEVUserExpBundle:Preferences v join v.iduser k
             where k.roles !='a:1:{i:0;s:10:\"ROLE_ADMIN\";}'");
        $complaints=$query->getResult();

        foreach($complaints as &$v){
           $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getIduser()->getId();
           $link=$link.utf8_encode("/warning'>Send warning</a>");
            $email=$v->getIduser()->getEmail();
            $address=$v->getAddressVar();
            $phone=$v->getTelephoneVar();

            $list[] = array('Username'=>$v->getIduser()->getUsername(), 'Useremail'=>$email, 'Address'=>$address, 'Telephone'=> $phone, 'Warning'=>$link);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/allusersadmin.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/allusersadmin.html.twig', array(
            'complaints' => $complaints,
        ));
    }
    public function displayPendingComplaintsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $complaints = $em->getRepository('ESPRITPIDEVUserExpBundle:Complaints')->findBy(array('status'=>'Seen'), array('datetime'=>'desc'), null,0);
        foreach($complaints as &$v) {
            $v->setId(utf8_encode($v->getId()));
            $v->setContent(utf8_encode($v->getContent()));
            $v->setType(utf8_encode($v->getType()));
            $v->setDatetime(utf8_encode( $v->getDatetime()->format('Y-m-d H:i:s')) );
            $v->setAttachment(utf8_encode($v->getAttachment()));
            $v->setStatus(utf8_encode($v->getStatus()));
        }
        foreach($complaints as &$v){
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getId();
            $link=$link.utf8_encode("/show'>Display</a>");
            $list[] = array('Id' => $v->getId(), 'Type' => $v->getType(), 'Datetime' => $v->getDatetime(),
                'Attachment' => $v->getAttachment(), 'Status' => $v->getStatus(),'Content' => $link, 'Username'=>$v->getIduser()->getUsername(), 'Useremail'=>$v->getIduser()->getEmail(),);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/pendingcomplaints.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/displaypendingcomplaintsadmin.html.twig', array(
            'complaints' => $complaints,
        ));
    }
    public function displaySeenComplaintsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $complaints = $em->getRepository('ESPRITPIDEVUserExpBundle:Complaints')->findBy(array('status'=>'Seen'), array('datetime'=>'asc'), null,0);
        foreach($complaints as &$v) {
            $v->setId(utf8_encode($v->getId()));
            $v->setContent(utf8_encode($v->getContent()));
            $v->setType(utf8_encode($v->getType()));
            $v->setDatetime(utf8_encode( $v->getDatetime()->format('Y-m-d H:i:s')) );
            $v->setAttachment(utf8_encode($v->getAttachment()));
            $v->setStatus(utf8_encode($v->getStatus()));
        }
        foreach($complaints as &$v){
            $link=utf8_encode("<a href='/piv1/web/app_dev.php/admin/").$v->getId();
            $link=$link.utf8_encode("/show'>Display</a>");
            $list[] = array('Id' => $v->getId(), 'Type' => $v->getType(), 'Datetime' => $v->getDatetime(),
                'Attachment' => $v->getAttachment(), 'Status' => $v->getStatus(),'Content' => $link, 'Username'=>$v->getIduser()->getUsername(), 'Useremail'=>$v->getIduser()->getEmail(),);
        }

        if (isset($list)) {
            $fp = fopen('bundles/ESPRITPIDEV/UserExpBundle/tables/seencomplaints.json', 'w');
            fwrite($fp, json_encode($list));
            fclose($fp);
        }
        return $this->render('complaints/seenComplaints.html.twig', array(
            'complaints' => $complaints,
        ));
    }
    /**
     * Deletes a complaint entity.
     *
     */
    public function deleteAction(Request $request, Complaints $complaint)
    {
        $form = $this->createDeleteForm($complaint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $complaint->setStatus('Rejected');
            $em->persist($complaint);
            $em->flush($complaint);

            $notification= new Notification("Complaint rejected!", "Complaint Delete", "Unseen",$complaint->getIduser() );
            $em->persist($notification);
            $em->flush();
        }

        return $this->redirectToRoute('complaints_index');
    }

    public function warningAction(Request $request, User $user)
    {
            $em = $this->getDoctrine()->getManager();
            $warning = new Warning($user);
            $em->persist($warning);
            $em->flush();

            $notification= new Notification("You have been warned due to a complaint! Behave!", "Warning", "Unseen",$user );
            $em->persist($notification);
            $em->flush();

        $querywarning = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v.id) as counted FROM ESPRITPIDEVUserExpBundle:Warning v 
             where v.iduser=:id  and (DATE_DIFF( v.datetime, CURRENT_DATE())<90)")
            ->setParameter('id', $this->getUser()->getId());
        $warning=$querywarning->getSingleResult();
        $warningnumber=$warning['counted'];
        if ($warningnumber==3)
        {
            $user->setEnabled(false);
            $em->persist($user);
            $em->flush();
        }

        $this->addFlash('success', 'A warning <a href="/" class="alert-link"> has been sent successfully!</a>');

        return $this->redirectToRoute('complaints_index');

    }
    public function drilldownAction()
    {$ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->chart->type('pie');

        $ob->title->text('Music listeners');
        $ob->plotOptions->series(
            array(
                'dataLabels' => array(
                    'enabled' => true,
                    'format' => '{point.name}: {point.y:.1f}'
                )
            )
        );

        $ob->tooltip->headerFormat('<span style="font-size:11px">{series.name}</span><br>');
        $ob->tooltip->pointFormat('<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>');
        $query = $this->getDoctrine()->getEntityManager()->createQuery("
select count(v.iduser) as counted,
 v.music as musicallow, 
 v.musictaste as taste 
 from ESPRITPIDEVUserExpBundle:Preferences v
 where v.music=0 
 group by v.musictaste 
             ");
        $query2 = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v.iduser) as counted, v.music as musicallow
              FROM ESPRITPIDEVUserExpBundle:Preferences v group by  v.music        
        ");

        $counted=$query2->getResult();
        $data= array();
        foreach($counted as &$v) {
            $k='';
            if ($v['musicallow']=='1')
            {$k='Allows music';
                array_push($data,array('name'=>$k,'y'=>intval($v['counted']),'drilldown'=>'Allows music','visible'=>true));
            }
            else {$k="Doesn't allow music";
                array_push($data,array('name'=>$k,'y'=>intval($v['counted']),'drilldown'=>null,'visible'=>true));
            }

        }
        $musictastearray=array();
        $counted2=$query->getResult();
        foreach($counted2 as &$v) {
            array_push($musictastearray,array($v['taste'],intval($v['counted'])));
        }

        $ob->series(
            array(
                array(
                    'name' => 'Music listeners',
                    'colorByPoint' => true,
                    'data' => $data
                )
            )
        );

        $drilldown = array(
            array(
                'name' => 'Allows music',
                'id' => 'Allows music',
                'data' => $musictastearray
            ),

        );
        $ob->drilldown->series($drilldown);

        return $this->render(':complaints:musictastedrilldown.html.twig', array(
            'piechart' => $ob
        ));
    }

    public function animalchartAction()
    {
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Users allowing animals');
        $ob->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));



        $em = $this->getDoctrine()->getManager();
        $query = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v.iduser) as counted, v.animal as animalism
              FROM ESPRITPIDEVUserExpBundle:Preferences v group by v.animal
             ");
        $counted=$query->getResult();
        $statArray= array();
        foreach($counted as &$v) {
            $k='';
            if ($v['animalism']=='1')
                $k='Allows animals';
            else $k="Doesn't allow animals";
            array_push($statArray,array($k,intval($v['counted'])));
        }



        $ob->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $statArray)));
        return $this->render(':complaints:musicPieChart.html.twig', array(
            'piechart' => $ob
        ));
    }

    public function chartAction()
    {
        $emConfig= $this->getDoctrine()->getEntityManager()->getConfiguration();
        $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
        $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');

        $em = $this->getDoctrine()->getManager();



        $query = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v) as counted, 
            MONTH(v.datetime) as monthgb  FROM ESPRITPIDEVUserExpBundle:Complaints v 
             group by monthgb");
        $complaints=$query->getResult();
        $statArray= array();

        foreach($complaints as &$v) {
            array_push($statArray,intval($v['counted']));
        }


        // Chart
        $series = array(
            array("name" => "Evolution of the complaints",    "data" => $statArray)
        );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->title->text('Number of complaints over a year');
        $categories = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

        $ob->xAxis->title(array('text'  => "Months"));
        $ob->xAxis->categories($categories);
        $ob->yAxis->title(array('text'  => "Number of complaints"));
        $ob->series($series);

        return $this->render(':complaints:testingCharts.html.twig', array(
            'chart' => $ob
        ));
    }


    /**
     * Creates a form to delete a complaint entity.
     *
     * @param Complaints $complaint The complaint entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Complaints $complaint)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('complaints_delete', array('id' => $complaint->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



}
